<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama_p','harga_p','id_kategori','photo'];
    public function kategories()
    {
        return $this->belongsTo('App\Models\KategoriProduk','id_kategori');
    }
    public function getPhotoPathAttribute(){
        if ($this->photo !== ''){
            return url('/img/' . $this->photo);
        }else{
            return 'http://placehold.it/850x618';
        }
    }
}
