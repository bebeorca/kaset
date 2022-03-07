@extends('dashboard/layouts/main')

@section('container')

    <h1>{{ $menu->nama_menu }}</h1>
    <h3>{{ $menu->harga / 1000 . "K"}}</h3>
    
    @if ($menu->kategori == '1')
        <h3>Makanan</h3>
    @elseif($menu->kategori == '2')
        <h3>Minuman</h3>
    @else <h3>Snack</h3>
    @endif

    <p>{{ $menu->deskripsi }}</p>

    @if ($menu->gambar)
        <img src="{{ asset("storage/" . $menu->gambar) }}" class="gambar-preview img-fluid mb-3 col-sm-5 d-block w-25">  
    @else
        <img src="/img/merah.png" class="gambar-preview img-fluid mb-3 col-sm-5 d-block w-25">  
    @endif

    <div class="mt-5">
        <a href="/dashboard/menus" class="btn btn-info"><span data-feather="arrow-left"></span> Kembali</a>
        <a href="/dashboard/menus/edit/{{ $menu->uuid }}" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/menus/delete/{{ $menu->uuid }}" method="post" class="d-inline">
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus menu?')">
              <span data-feather="trash"></span> Hapus
            </button>
        </form>
    </div>
    

@endsection