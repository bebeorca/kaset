<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login/index', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            if(Auth::user()->user_id === 1){
                return redirect()->intended('/dashboard');
            }elseif(Auth::user()->user_id === 2){
                return redirect()->intended('/dashboard');
            }
            
        }

        return back()->with('loginError', "Login gagal, coba lagi!");

    }

    protected function authenticated(){
        if(Auth::user()->user_id === '2'){
            return redirect('/dashboard');
        }elseif(Auth::user()->user_id === 0){
            return redirect('/');
        }
    }

    public function updateProfile(){
        return view('/profile', [
            "title" => "Profile"
        ]);
    }

    public function profile(){
        return view('/', [
            "title" => "Profile"
        ]);
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');

    }

}
