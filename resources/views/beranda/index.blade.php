@extends('layouts/main')

@section('cardContainer')


<div class="row justify-content-center mb-3">
    <div class="col-auto"><a class="text-decoration-none text-dark fs-5 fw-bold pilihan-menu" href="/">Semua</a></div>
    <div class="col-auto"><a class="text-decoration-none text-dark fs-5 fw-bold pilihan-menu" href="/makanan">Makanan</a></div>
    <div class="col-auto"><a class="text-decoration-none text-dark fs-5 fw-bold pilihan-menu" href="/minuman">Minuman</a></div>
    <div class="col-auto"><a class="text-decoration-none text-dark fs-5 fw-bold pilihan-menu" href="/snack">Snack</a></div>
</div>


<div class="row gy-5">
    @foreach ($menus as $menu)
            <!-- card -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card" style="width: w-100;">
                <img src="$foto_makanan" class="card-img-top" alt="$nama_makanan">
                <div class="card-body">
                <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                <p class="card-text">{{ $menu->deskripsi }}</p>
                <a href="#" class="btn btn-primary">Beli</a>
                </div>
            </div>
        </div>
        <!-- end card --> 
    @endforeach
</div>

@endsection
