<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaketTravelRequest;
use App\PaketTravel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketTravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items= PaketTravel::all();

       return view('pages.admin.paket-travel.index',[
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
        return view('pages.admin.paket-travel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaketTravelRequest $request)
    {
        $data= $request->all();
        $data['slug'] = Str::slug($request->judul);

        PaketTravel::create($data);
        return redirect()->route('paket-travel.index');
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
        $item = PaketTravel::findOrFail($id);

        return view('pages.admin.paket-travel.edit',[
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
    public function update(PaketTravelRequest $request, $id)
    {
        $data= $request->all();
        $data['slug'] = Str::slug($request->judul);

        $item=PaketTravel::findOrFail($id);

        $item->update($data);

        return redirect()->route('paket-travel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =PaketTravel::findOrFail($id);
        $item->delete();

        return redirect()->route('paket-travel.index');
    }
}
