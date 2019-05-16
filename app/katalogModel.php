<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katalogModel extends Model
{
    //
    protected $table = 'katalog';
    protected $primaryKey = 'idKatalog';
    protected $fillabel = ['idKatalog','warna_produk','nama_produk','detail','harga','stok'];


public function get_kategori()
{
    return $this->belongsTo(kategoriModel::class,'idKategori_fk');
}

}