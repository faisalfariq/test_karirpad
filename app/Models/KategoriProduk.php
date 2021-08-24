<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kategori'];
    public function produks()
    {
        return $this->hasMany('App\Models\Produk','id_kategori');
    }
}
