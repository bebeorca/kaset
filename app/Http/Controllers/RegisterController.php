<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register/index', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            "nama_lengkap" => "required|max:255",
            "nama_panggilan" => "required|max:100",
            "nis" => ['required', 'unique:users', 'numeric'],
            "username" => ['required', 'min:6', 'max:100', 'unique:users', 'alpha_dash'],
            "kelas" => ["required"],
            "password" => ["required", "min:8", "max:255"],
            "konfirmasi_password" => ["required", "same:password"],
            "nomor_telepon" => ["required", "unique:users", "numeric"]
        ]);

        $validatedData["password"] = bcrypt($validatedData["password"]);

        //$request->session()->flash('success', "Registrasi berhasil!");

        User::create(
            $validatedData
        );

        return redirect('/login')->with('success', "Registrasi berhasil!");
    }
}
