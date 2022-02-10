<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

use App\Models\Menus;

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

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/tambah-menu', [DashboardController::class, 'show_tambah_menu'])->middleware('auth');

Route::get('/riwayat-pesanan', [DashboardController::class, 'show_riwayat_pesanan'])->middleware('auth');
//end dashboard

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/update-profile', [LoginController::class, 'updateProfile'])->middleware('auth');
Route::get('/profile', [LoginController::class, 'profile'])->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function (){
    return view('beranda/index', [
        "title" => "Beranda",
        "menus" => Menus::all()
    ]);
});

Route::get('/makanan', function (){
    return view('beranda/index', [
        "title" => "Beranda",
        "menus" => Menus::where('kategori', 1)->get()
    ]);
});

Route::get('/minuman', function (){
    return view('beranda/index', [
        "title" => "Beranda",
        "menus" => Menus::where('kategori', 2)->get()
    ]);
});

Route::get('/snack', function (){
    return view('beranda/index', [
        "title" => "Beranda",
        "menus" => Menus::where('kategori', 3)->get()
    ]);
});