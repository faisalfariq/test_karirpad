<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class UserProdukController extends Controller
{
    //

    public function index(Request $request)
    {
        //
        $q = $request->get('q');
        $data_kategori = KategoriProduk::pluck('nama_kategori','id');
        $produk = Produk::where('nama_p', 'LIKE', '%'.$q.'%')->with('kategories')->get();

        return view('layout_user.index',compact('produk','data_kategori'));
    }

}
