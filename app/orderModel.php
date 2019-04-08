<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    //
    protected $table = 'order';
    protected $fillabel = ['id','jumlah_order','total','total_harga','tanggal_waktu_order'];
}
