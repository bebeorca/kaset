<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/menus/index', [
            "menus" => Menus::where('kantin_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/menus/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "nama_menu" => ["required"],
            "kategori" => ["required"], 
            "harga"  => ["required", "numeric"],
            "deskripsi" => ["required"],
            "gambar" => ["image", "file", "max:1024"]
        ]);
        
        if($request->file("gambar")){
            $validatedData["gambar"] = $request->file("gambar")->store("gambar-menus");
        }

        $validatedData["kantin_id"] = auth()->user()->id;
        $validatedData["uuid"] = Str::uuid()->tostring();

        Menus::create($validatedData);

        return redirect('/dashboard/menus')->with('success', "Menu baru telah ditambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function show(Menus $menus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function edit(Menus $menus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menus $menus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menus $menus)
    {
        // Menus::destroy($menus->id);
        // return redirect('/dashboard/menus')->with('success', "Menu telah dihapus");
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(Menus::class, 'slug', $request->nama_menu); 
        return response()->json(['slug' => $slug]);

    }

}
