<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katalogModel extends Model
{
    //
    protected $table = 'katalog';
    protected $fillabel = ['idKatalog','pict','nama_produk','detail','harga','stok'];
}
