<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class PaketTravel extends Model
{
    use softDeletes;

    protected $fillable = [
        'judul','slug','lokasi','tentang',
        'event','bahasa','makanan','tgl_berangkat',
        'durasi','tipe','harga'
    ];

    protected $hidden = [

    ];
    public function gambar(){
        return $this->hasMany(Gambar::class,'paket_travel_id','id');
    }
}
