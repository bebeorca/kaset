@extends('layouts/main')

@section('cardContainer')

<div class="row mb-5 gx-0 justify-content-center">
        <div class="col text-center mt-3 col-md-auto"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'beranda' ? 'link-light bg-danger' : ''}}" style="border-radius: 20px;" id="pilihan-menu1" href="/#menu">Semua</a></div>
        <div class="col text-center mt-3 col-md-auto"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'makanan' ? 'link-light bg-danger' : ''}}" style="border-radius: 20px;" id="pilihan-menu2" href="/makanan#menu">Makanan</a></div>
        <div class="col text-center mt-3 col-md-auto"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'minuman' ? 'link-light bg-danger' : ''}}" style="border-radius: 20px;" id="pilihan-menu3" href="/minuman#menu">Minuman</a></div>
        <div class="col text-center mt-3 col-md-auto"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'snack' ? 'link-light bg-danger' : ''}}" style="border-radius: 20px;" id="pilihan-menu4" href="/snack#menu">Snack</a></div>
</div>

@if(session()->has('limit'))
    <div class="container" style="margin-top: 100px">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('limit') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif


<div class="row gy-4">
    @foreach ($menus as $menu)

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card" style="border-radius: 20px;">
                <p class="text-danger fw-bold fs-5 position-absolute top-0 end-0 me-3 mt-2 bg-light px-2" style="z-index: 10; border-radius:50px">{{ $menu->harga / 1000 . 'K' }}</p>
                @if ($menu->gambar)
                    <div class="card" style="height: 200px; background-image: url('{{ asset("storage/" . $menu->gambar) }}'); background-size: cover; background-repeat: no-repeat; background-position: center; border-radius: 20px 20px 0px 0px;"></div>
                @else 
                    <div class="card" style="height: 200px; background-image: url('{{ asset('/img/merah.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; border-radius: 20px 20px 0px 0px; background-size:80%;"></div>
                @endif
                <div class="card-body bg-danger text-light px-4 py-4 d-flex flex-column" style="margin-top: -20px; border-radius: 0 0 20px 20px">
                    <h5 class="card-title mt-2">{{ $menu->nama_menu }}</h5>
                    <p class="card-text">{{ $menu->deskripsi }}</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mt-3"> <i class="bi bi-shop"></i> {{ $menu->kantin->nama_kantin }}</p>
                        </div>

                        @auth

                            @if (auth()->user()->user_id == '1')
                                @if ($itemPesanan->count() == 0)
                                    <form action="/pesanan" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="kantin_id" value="{{ $menu->kantin->id }}">
                                        <input type="hidden" name="nama_menu" value="{{ $menu->nama_menu }}">
                                        <input type="hidden" name="harga" value="{{ $menu->harga }}">
                                        <input type="hidden" name="kuantitas" value="1">
                                        <input type="hidden" name="nama_kantin" value="{{ $menu->kantin->nama_kantin }}">
                                        <input type="hidden" name="gambar" value="{{ $menu->gambar }}">
                                        <button class="btn btn-light" type="submit" style="border-radius: 50px;">
                                            <i class="bi bi-basket3"></i> Pesan
                                        </button>
                                    </form>
                                @else
                                    <form action="/pesanan-limit" method="post">
                                        @csrf
                                        <button class="btn btn-light" type="submit" style="border-radius: 50px;">
                                            <i class="bi bi-basket3"></i> Pesan
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @else
                            <form action="/login">
                                @csrf
                                <button class="btn btn-light" type="submit" style="border-radius: 50px;">
                                    <i class="bi bi-basket3"></i> Pesan
                                </button>
                            </form>

                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
        
    @endforeach
</div>

<div class="row justify-content-center mt-5">
    <div class="col-auto">
        <a href="/menus" class="link-danger fs-3 text-decoration-none fw-bold">Lihat lebih banyak <i class="bi bi-arrow-right"></i></a>
    </div>
</div>

<script type="text/javascript">
    window.addEventListener( "pageshow", function ( event ) {
    var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
        if ( historyTraversal ) {
            window.location.reload();
        }
    });
</script>

@endsection


