<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    //
    protected $table = 'order';
    protected $primaryKey = 'idOder';
    protected $fillabel = ['idOrder','jumlah_order','total','total_harga','tanggal'];

    public function get_katalog()
    {
        return $this->belongsTo(katalogModel::class,'idKatalog_fk');
    }

}
