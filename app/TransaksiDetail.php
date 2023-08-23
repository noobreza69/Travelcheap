<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransaksiDetail extends Model
{
    use softDeletes;

    public $table = "transaksi_detail";

    protected $fillable = [
        'transaksi_id','username','negara','is_visa',
        'doe_passport',
    ];

    protected $hidden = [

    ];

   
    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
    

}
