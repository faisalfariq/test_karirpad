<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $q = $request->get('q');
        $kategori_produk = KategoriProduk::where('nama_kategori', 'LIKE', '%'.$q.'%')->get();
        return view('kategori_produk.index',compact('kategori_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'nama_kategori' => 'required|string|max:255',

            ]);
             KategoriProduk::create($request->all()); 
             return redirect()->route('kategori_produk.index')->with('success', 'Berhasil Menyimpan Data Kategori : '.$request->get('nama_kategori'));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Produk::findOrFail($id);
        return view('kategori_produk.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $kategori = KategoriProduk::findOrFail($id);

        $this->validate($request, [
            'nama_kategori' => 'required|string|max:255',
        ]);
        $kategori->update();
        return redirect()->route('kategori_produk.index')->with('success', 'Berhasil Update Data Kategori : '.$request->get('nama_kategori'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = KategoriProduk::find($id)->delete();
        $produk->delete();
        return redirect()->route('kategori_produk.index')->with('error','Berhasil Hapus Data Kategori !!');
    }

}
