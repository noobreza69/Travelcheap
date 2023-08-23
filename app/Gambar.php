<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Gambar extends Model
{
    use softDeletes;

    public $table = "gambar";

    protected $fillable = [

        
        'paket_travel_id','img',
    ];

    protected $hidden = [

    ];

    public function paket_travel(){
        return $this->belongsTo(PaketTravel::class,'paket_travel_id','id');
}

}
