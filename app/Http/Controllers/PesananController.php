<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Menus;
use App\Models\Pesanan;
use App\Models\PesananAdmin;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Redis;

class PesananController extends Controller
{
    public function index(){
        return view('beranda/pesanan/index', [
            "title" => "Pesanan",
            "menus" => Pesanan::where('user_id', auth()->user()->id)->get(),
            "myPesanan" => PesananAdmin::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function pesanan(Request $request){
        
        Pesanan::create([
            "kantin_id" => $request->kantin_id,
            "user_id" => $request->user_id,
            "nama_menu" => $request->nama_menu,
            "harga" => $request->harga,
            "kuantitas" => $request->kuantitas,
            "nama_kantin" => $request->nama_kantin,
            "gambar" => $request->gambar
        ]);

        return redirect('/pesanan');

    }

    public function pesananAdmin(Request $request){

        PesananAdmin::create([
            "kantin_id" => $request->kantin_id,
            "user_id" => $request->user_id,
            "nama_menu" => $request->nama_menu,
            "harga" => $request->harga,
            "kuantitas" => $request->kuantitas,
            "nama_kantin" => $request->nama_kantin,
            "gambar" => $request->gambar,
            "status" => $request->status
            
        ]);

        Pesanan::where('user_id', auth()->user()->id)->delete();

        return redirect('/pesanan')->with('success', "Mohon tunggu konfirmasi dari kantin, ya");

    }

    public function deletePesanan(Pesanan $pesanan){
            Pesanan::destroy($pesanan->id);
            return redirect('/pesanan');
    }

    public function pesananLimit(){
        return redirect('/pesanan')->with('limit', 'Mohon selesaikan pemesanan anda sebelumnya.');
    }

    public function setOrderanStatus(Request $request){
        // return $request;

        PesananAdmin::where('id', $request->id)->update(["status" => $request->status]);

        return redirect('/dashboard/orderan');
    }

}
