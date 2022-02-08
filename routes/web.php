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

Route::get('/pesanan', function () {
    return view('pesanan', [
        "title" => "Pesanan",
        "page_name" => "Pesanan"
    ]);
});

Route::get('/tambah-menu', function () {
    return view('tambah_menu', [
        "title" => "Tambah Menu",
        "page_name" => "Tambah Menu"
    ]);
});

Route::get('/riwayat-pesanan', function () {
    return view('riwayat_pesanan', [
        "title" => "Riwayat Pesanan",
        "page_name" => "Riwayat Pesanan"
    ]);
});