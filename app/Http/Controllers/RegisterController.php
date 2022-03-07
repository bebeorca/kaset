<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register/index', [
            "title" => "Register"
        ]);
    }

    public function indexKantin(){
        return view('register/registerKantin', [
            "title" => "Register",
            "i" => User::where('id')
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            //user
            "nama_lengkap" => "required|max:255",
            "nis" => ['required', 'unique:users', 'numeric', 'min:9'],
            "kelas" => ["required"],

            //kantin
            "nama_kantin" => "required|max:255",
            "nama_pemilik" => "required|max:100",

            //both
            "user_id" => "required",
            "username" => ['required', 'min:6', 'max:100', 'unique:users', 'alpha_dash'],
            "password" => ["required", "min:8", "max:255"],
            "konfirmasi_password" => ["required", "same:password"],
            "nomor_telepon" => ["required", "unique:users", "numeric", 'min:11'],
        ]);

        $validatedData["password"] = bcrypt($validatedData["password"]);

        $validatedData["uuid"] = Str::uuid()->tostring();

        if($validatedData["nama_kantin"] == '--' && $validatedData["nama_pemilik"] == '--'){
            $validatedData["nama_kantin"] = Str::random(255);
            $validatedData["nama_pemilik"] = Str::random(255);
        }

        User::create(
            $validatedData
        );

        // if($validatedData["user_id"] === 2){
        //     return redirect('/login-kantin')->with('success', "Registrasi berhasil!");
        // }

        return redirect('/login')->with('success', "Registrasi berhasil!");
    }

}
