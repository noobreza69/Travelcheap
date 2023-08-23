<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GambarRequest;
use App\Gambar;
use App\PaketTravel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items= Gambar::with(['paket_travel'])->get();

       return view('pages.admin.gambar.index',[
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
        $paket_travel = PaketTravel::all();
        return view('pages.admin.gambar.create',[
            'paket_travel' => $paket_travel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GambarRequest $request)
    {
        $data= $request->all();
        $data['img']= $request->file('img')->store(
            'assets/gambar','public'
        );

        Gambar::create($data);
        return redirect()->route('gambar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Gambar::findOrFail($id);
        $paket_travel = PaketTravel::all();
        return view('pages.admin.gambar.edit',[
            'item' => $item,
            'paket_travel' => $paket_travel,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GambarRequest $request, $id)
    {
        $data= $request->all();
        $data['img']= $request->file('img')->store(
            'assets/gambar','public'
        );

        $item=Gambar::findOrFail($id);

        $item->update($data);

        return redirect()->route('gambar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =Gambar::findOrFail($id);
        $item->delete();

        return redirect()->route('gambar.index');
    }
}
