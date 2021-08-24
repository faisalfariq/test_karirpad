<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;

use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:superuser');
    }



    public function index(Request $request)
    {
        //
        $q = $request->get('q');
        $data_kategori = KategoriProduk::pluck('nama_kategori','id');
        $produk = Produk::where('nama_p', 'LIKE', '%'.$q.'%')->with('kategories')->get();

        return view('produk.index',compact('produk','data_kategori'));
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

            'nama_p' => 'required|string|max:255',
            'harga_p' => 'required',
            'id_kategori' => 'required',
            'photo' => 'mimes:jpeg,png|max:10240'

            ]);
        $data = $request->only('nama_p', 'harga_p', 'id_kategori');
            if ($request->hasFile('photo'))
            {
                $data['photo'] = $this->savePhoto($request->file('photo'));
            }
             Produk::create($data); 
             return redirect()->route('produk.index')->with('success', 'Berhasil Menyimpan Data Barang : '.$request->get('nama_p'));
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $photoName = Str::random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $photo->move($destinationPath, $photoName);

        return $photoName;
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
        $produk = Produk::findOrFail($id);
        $data_kategori = KategoriProduk::pluck('nama_kategori','id');
        return view('produk.edit', compact('produk','data_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $produk = Produk::findOrFail($id);

        $this->validate($request, [
            'nama_p' => 'required|string|max:255',
            'harga_p' => 'required',
            'id_kategori' => 'required',
            'photo' => 'mimes:jpeg,png|max:10240',
        ]);

        $data = $request->only('nama_p', 'harga_p', 'id_kategori');
        $produk->update($data);
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
            if ($produk->photo !== '') $this->deletePhoto($produk->photo);
        }
            $produk->update($data);
        return redirect()->route('produk.index')->with('success', 'Berhasil Update Data Barang : '.$request->get('nama_p'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id)->delete();
        if ($produk->photo !== '') $this->deletePhoto($produk->photo);
        $produk->delete();
        return redirect()->route('produk.index')->with('error','Berhasil Hapus Data Barang !!');
    }

    public function deletePhoto($photoname)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $photoname;
        return File::delete($path);
    }

}
