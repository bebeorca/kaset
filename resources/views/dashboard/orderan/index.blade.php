@extends('dashboard/layouts/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orderan untuk {{  auth()->user()->nama_kantin  }}</h1>
    </div>

    <div class="container">
        <div class="row gx-5">

            @foreach ($pesanan as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card mb-5 " style="width: 18rem;">
                        <img src="{{ asset("storage/" . $item->gambar) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_menu }}</h5>
                            <h6>{{ $item->user->nama_lengkap }} pesan {{ $item->kuantitas }} porsi, dengan total harga {{ $item->harga }}</h6>

                            @if ($item->status == '0')
                                <form action="/dashboard/orderan/set-status/{{ $item->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="status" value="1">
                                    <button class="btn w-100 mt-3 text-light" style="background-color: #6cc524">
                                        Terima pesanan
                                    </button>
                                </form>
                                <form action="/dashboard/orderan/set-status/{{ $item->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="status" value="3">
                                    <button class="btn btn-danger w-100 mt-3">
                                        Tolak pesanan
                                    </button>   
                                </form>
                            @elseif($item->status == '1')
                                <form action="/dashboard/orderan/set-status/{{ $item->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="status" value="2">
                                    <button class="btn w-100 mt-3 text-light" style="background-color: #6cc524">
                                        Pesanan sudah siap diambil
                                    </button>
                                </form>
                            @elseif($item->status == '2')
                                <button class="btn btn-primary w-100 mt-3 text-light">
                                    Pelanggannya akan segera ke tempatmu, tunggu sebentar ya
                                </button>
                            @elseif($item->status == '3')
                            <button class="btn btn-primary w-100 mt-3 text-light">
                                Pesanan tidak dikonfirmasi.
                            </button>
                            @endif
                            
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    
    

@endsection