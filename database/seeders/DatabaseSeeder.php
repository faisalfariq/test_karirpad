<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departement;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\User;
use App\Models\JamAbsensi;
use App\Models\KategoriProduk;
use App\Models\Produk;


use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(1)->create();

        KategoriProduk::create([
            'nama_kategori' =>'Retail'
        ]);

        KategoriProduk::create([
            'nama_kategori' =>'Wholesale'
        ]);

        Produk::create([
            'nama_p' => 'Headset',
            'harga_p' => 45000,
            'id_kategori' => 1,
        ]);

        Produk::create([
            'nama_p' => 'Spidol',
            'harga_p' => 5000,
            'id_kategori' => 2,
        ]);

        Produk::create([
            'nama_p' => 'Kertas A4',
            'harga_p' => 35000,
            'id_kategori' => 2,
        ]);

        Produk::create([
            'nama_p' => 'Kabel USB',
            'harga_p' => 15000,
            'id_kategori' => 1,
        ]);
        

        User::create([
            'email' => 'superuser@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('superuser'), 
            'nama_pegawai' => 'Super User',
            'level' => 'superuser'
        ]);

        User::create([
            'email' => 'faisal@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('faisal'), 
            'nama_pegawai' => 'Moh. Faisal Fariq',
            'level' => 'user'
        ]);

    }
}
