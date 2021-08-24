<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\UserProdukController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


Route::get('/', function () {
    return redirect('/login');
});


Route::resource('produk',ProdukController::class);
Route::resource('kategori_produk',KategoriProdukController::class);
Route::resource('user_produk',UserProdukController::class);

Route::get('/register',[LoginController::class,'register']);
Route::post('/register',[LoginController::class,'store']);
Route::get('/login',[LoginController::class,'login']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/logout',[LoginController::class,'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
