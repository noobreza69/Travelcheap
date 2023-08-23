<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransaksiSukses;

use App\Transaksi;
use App\TransaksiDetail;
use App\PaketTravel;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index(Request $request, $id){
        $item = Transaksi::with(['details','paket_travel','user'])->findOrFail($id);
        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id){
        
        $paket_travel = PaketTravel::findOrFail($id);

        $transaksi = Transaksi::create([

            'paket_travel_id' => $id,
            'user_id' => Auth::user()->id,
            'visa_tambahan' => 0,
            'total' => $paket_travel->harga,
            'status' => 'IN_CART'

        ]);

        TransaksiDetail::create([
            'transaksi_id' => $transaksi->id,
            'username' => Auth::user()->username,
            'negara' => 'Indonesia',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaksi->id);
    }

    public function remove(Request $request, $detail_id){
        $item =TransaksiDetail::findOrFail($detail_id);

        $transaksi= Transaksi::with(['details','paket_travel'])->findOrFail($item->transaksi_id);

        if($item->is_visa){

            $transaksi->total -= 750000;
            $transaksi->visa_tambahan -= 750000;
          
        }

        $transaksi->total -= $transaksi->paket_travel->harga;

        $transaksi->save();

        $item->delete();

        return redirect()->route('checkout', $item->transaksi_id);
    }

    public function create(Request $request, $id){
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transaksi_id'] = $id;

        TransaksiDetail::create($data);

        $transaksi= Transaksi::with(['paket_travel'])->find($id);

        if($request->is_visa){

            $transaksi->total += 750000;
            $transaksi->visa_tambahan += 750000;
          
        }

        $transaksi->total += $transaksi->paket_travel->harga;

        $transaksi->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id){
        
        $transaksi = Transaksi::with(['details','paket_travel.gambar',
        'user'])->findOrFail($id);
        $transaksi->status='PENDING';
        $transaksi->save();

        //set konfigurasi midtrans

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        //buat array untuk midtrans
        $midtrans_params =[
            'transaksi_detail' =>[
                'order_id' =>'MIDTRANS' . $transaksi->id,
                'gross_amount' => (int) $transaksi->total,
            ],

            'customer_detail' => [
                'first_name' =>$transaksi->user->name,
                'email' =>$transaksi->user->email,
            ],
            
            'enabled_payments' =>['gopay'],
            'vtweb' =>[]
        ];

        try {
            //ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            //redirect ke halaman midtrans
            header('Location:' .$paymentUrl);
        } catch (Exception $th) {
            echo $e->getMessage();
        }


        //return ($transaksi);
        //kirim email ke user
       //Mail::to($transaksi->user)->send(
            //new TransaksiSukses($transaksi)
        //);

        //return view('pages.success');
    }
}
