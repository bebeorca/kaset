<?php

use App\Http\Controllers\DashboardMenusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Menus;
use App\Models\Pesanan;
use App\Models\PesananAdmin;
use App\Models\User;

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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/profile/{users:uuid}', function (User $users){

    return view('profile', [
        "title" => "Profile",
        "user" => $users
    ]);
})->middleware('auth');

Route::post('/user-profile-update/{user:uuid}', function (Request $request, User $user){

    User::where('id', $user->id)->update([
        "nama_lengkap" => $request->nama_lengkap,
        "kelas" => $request->kelas,
        "nomor_telepon" => $request->nomor_telepon,
        "nis" => $request->nis,
        "username" => $request->username

    ]);

    return redirect('/profile/' . auth()->user()->uuid)->with('success', "Profile telah diperbarui");

});

Route::post('/kantin-update-profile/{user:uuid}', function (Request $request, User $user){

    // return $request;

    User::where('id', $user->id)->update([
        "nama_pemilik" => $request->nama_pemilik,
        "nama_kantin" => $request->nama_kantin,
        "nomor_telepon" => $request->nomor_telepon,
        "username" => $request->username

    ]);

    return redirect('/profile/' . auth()->user()->uuid)->with('success', "Profile telah diperbarui");

});

Route::post('/logout', [LoginController::class, 'logout']);


//kantin
Route::get('/register-kantin', [RegisterController::class, 'indexKantin']);
// Route::post('/register-kantin', [RegisterController::class, 'store']);

// Route::get('/login-kantin', function (){
    
// });

Route::get('/', function (){
    if(Auth::check()){
        return view('beranda/index', [
            "act" => "beranda",
            "title" => "Beranda",
            "menus" => Menus::paginate(6),
            "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
        ]);
    }else{
        return view('beranda/index', [
            "act" => "beranda",
            "title" => "Beranda",
            "menus" => Menus::paginate(6)
        ]);
    }
    
    
});

Route::get('/makanan', function (){
    if(Auth::check()){
        return view('beranda/index', [
            "act" => "makanan",
            "title" => "Beranda",
            "menus" => Menus::where('kategori', 1)->paginate(6),
            "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
        ]);
    }else{
        return view('beranda/index', [
            "act" => "makanan",
            "title" => "Beranda",
            "menus" => Menus::where('kategori', 1)->paginate(6)
        ]);
    }
    
});

Route::get('/minuman', function (){
    if(Auth::check()){
        return view('beranda/index', [
            "act" => "minuman",
            "title" => "Beranda",
            "menus" => Menus::where('kategori', 2)->paginate(6),
            "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
        ]);
    }else{
        return view('beranda/index', [
            "act" => "minuman",
            "title" => "Beranda",
            "menus" => Menus::where('kategori', 2)->paginate(6)
        ]);
    }
    
});

Route::get('/snack', function (){
    if(Auth::check()){
        return view('beranda/index', [
            "act" => "snack",
            "title" => "Beranda",
            "menus" => Menus::where('kategori', 3)->paginate(6),
            "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
        ]);
    }else{
        return view('beranda/index', [
            "act" => "snack",
            "title" => "Beranda",
            "menus" => Menus::where('kategori', 3)->paginate(6)
        ]);
    }
});

//semua menu
Route::get('/menus', function (){
    return view('beranda/menus/index', [
        "act" => "semua",
        "menus" => Menus::paginate(12),
        "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
    ]);
});

Route::get('/menus/makanan', function (){
    return view('beranda/menus/index', [
        "act" => "makanan",
        "menus" => Menus::where('kategori', 1)->paginate(12),
        "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
    ]);
});

Route::get('/menus/minuman', function (){
    return view('beranda/menus/index', [
        "act" => "minuman",
        "menus" => Menus::where('kategori', 2)->paginate(12),
        "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
    ]);
});

Route::get('/menus/snack', function (){
    return view('beranda/menus/index', [
        "act" => "snack",
        "menus" => Menus::where('kategori', 3)->paginate(12),
        "itemPesanan" => Pesanan::where("user_id", auth()->user()->id)->get()
    ]);
});
//end semua menu

//pesanan

Route::get('/pesanan', [PesananController::class, 'index'])->middleware('auth');

Route::post('/pesanan',[PesananController::class, 'pesanan']);

Route::post('/pesanan-limit', [PesananController::class, 'pesananLimit']);

Route::post('/dashboard/orderan/confirm/{pesanan:nama_kantin}',[PesananController::class, 'pesananAdmin']);

Route::post('/dashboard/orderan/delete/{pesanan:nama_kantin}', [PesananController::class, 'deletePesanan']);

Route::post('/dashboard/orderan/delete-finish-user/{pesanan:id}',function(PesananAdmin $pesanan){
    PesananAdmin::destroy($pesanan->id);
    return redirect('/pesanan');
});

//end pesanan


//admin middleware
Route::group(["middleware" => ["auth", "isAdmin:2"]], function (){
    
    // Route::get('/dashboard', function (){
    //     return view('dashboard/index');
    // });
    
    Route::resource('/dashboard/menus', DashboardMenusController::class);
    
    Route::get('/dashboard/menus/{menu:uuid}', function (Menus $menu){
        
        return view('dashboard/menus/menu', [
            "menu" => $menu
        ]);
        
    });
    
    Route::post('/dashboard/menus/delete/{menu:uuid}', function (Menus $menu){
        
        if($menu->gambar){
            Storage::delete($menu->gambar);
        }

        Menus::destroy($menu->id);
        return redirect('/dashboard/menus')->with('success', "Menu telah dihapus");
        
    });
    
    Route::resource('/dashboard/menus/tambah-menu', DashboardMenusController::class);

    Route::get('/dashboard/menus/edit/{menu:uuid}', function (Menus $menu){

        return view('dashboard/menus/edit', [
            "menu" => $menu
        ]);

    });

    Route::post('/dashboard/menus/edit/{menu:uuid}', function (Request $request, Menus $menu){

        $validatedData = $request->validate([
            "nama_menu" => ["required"],
            "kategori" => ["required"], 
            "harga"  => ["required", "numeric"],
            "deskripsi" => ["required"],
            "gambar" => ["image", "file", "max:1024"]
        ]);

        if($request->file("gambar")){
            if($request->gambarLama){
                Storage::delete($request->gambarLama);
            }

            $validatedData["gambar"] = $request->file("gambar")->store("gambar-menus");
            
        }

        Menus::where('id', $menu->id)
            ->update($validatedData);

        return redirect('/dashboard/menus')->with('success', "Menu telah berubah");

    });

    Route::get('/dashboard/orderan', function (){
        return view('/dashboard/orderan/index', [
            "title" => "Orderan",
            "pesanan" => PesananAdmin::where('kantin_id', auth()->user()->id)->get()
        ]);
    });

    Route::get('/dashboard/orderan-selesai', function (){
        return view('/dashboard/orderan/orderanSelesai/index', [
            "title" => "Orderan",
            "pesanan" => PesananAdmin::where('kantin_id', auth()->user()->id)->get()
        ]);
    });

    Route::post('/dashboard/orderan/set-status/{pesanan:id}',[PesananController::class, 'setOrderanStatus']);

    Route::post('/dashboard/orderan/delete-finish/{pesanan:id}',function(PesananAdmin $pesanan){
        PesananAdmin::destroy($pesanan->id);
        return redirect('/dashboard/orderan-selesai');
    });

});
//end admin middlewarw