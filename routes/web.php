<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $notification = array(
        'message' => 'I am a successful message!', 
        'alert-type' => 'success'
    );
    
    return Redirect::to('/')->with($notification);
});

Route::get('/','ProdukController@index');
Route::post('/tambahProduk','ProdukController@tambah_produk');
Route::post('/editProduk','ProdukController@edit_produk');
Route::post('/hapusProduk','ProdukController@hapus_produk');