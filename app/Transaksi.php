<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaksi extends Model
{
    use softDeletes;

    public $table = "transaksi";

    protected $fillable = [
        'paket_travel_id','user_id','visa_tambahan','total',
        'status',
    ];

    protected $hidden = [

    ];

    public function details(){
       return $this->hasMany(TransaksiDetail::class, 'transaksi_id', 'id');
    }
    public function paket_travel(){
        return $this->belongsTo(PaketTravel::class, 'paket_travel_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }   

}
