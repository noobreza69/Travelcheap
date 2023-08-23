<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaketTravel;
use App\Transaksi;

class DashboardController extends Controller
{
    public function index(Request $request){
        return view('pages.admin.dashboard',[
            'paket_travel' => PaketTravel::count(),
            'transaksi' => Transaksi::count(),
            'transaksi_pending' => Transaksi::where('status','PENDING')->count(),
            'transaksi_success' => Transaksi::where('status','SUCCESS')->count()
        ]);
    }
}
