<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        return view('dashboard/index');
    }

    // public function show_pesanan(){
    //     return view('dashboard/pesanan', [
    //         "title" => "Pesanan",
    //         "page_name" => "Pesanan"
    //     ]);
    // }

    // public function show_tambah_menu(){
    //     return view('dashboard/tambah_menu', [
    //         "title" => "Tambah Menu",
    //         "page_name" => "Tambah Menu"
    //     ]);
    // }

    // public function show_riwayat_pesanan(){
    //     return view('dashboard/riwayat_pesanan', [
    //         "title" => "Riwayat Pesanan",
    //         "page_name" => "Riwayat Pesanan"
    //     ]);
    // }
}
