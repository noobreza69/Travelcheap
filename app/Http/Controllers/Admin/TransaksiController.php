<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransaksiRequest;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items= Transaksi::with([
           'details','paket_travel','user',
       ])->get();

       return view('pages.admin.transaksi.index',[
           'items' => $items
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiRequest $request)
    {
        $data= $request->all();
        $data['slug'] = Str::slug($request->judul);

        Transaksi::create($data);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaksi::with([
            'details','paket_travel','user',
        ])->findOrFail($id);

        return view('pages.admin.transaksi.detail',[
            'item' => $item 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaksi::findOrFail($id);

        return view('pages.admin.transaksi.edit',[
            'item' => $item 
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransaksiRequest $request, $id)
    {
        $data= $request->all();
        $data['slug'] = Str::slug($request->judul);

        $item=Transaksi::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =Transaksi::findOrFail($id);
        $item->delete();

        return redirect()->route('transaksi.index');
    }
}
