<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PaketTravel;

class DetailController extends Controller
{
    public function index(Request $request, $slug){

        $item = PaketTravel::with(['gambar'])->where('slug', $slug)->firstOrFail();
        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
