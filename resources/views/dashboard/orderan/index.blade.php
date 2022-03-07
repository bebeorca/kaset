@extends('dashboard/layouts/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orderan untuk {{  auth()->user()->nama_kantin  }}</h1>
    </div>

    <div class="container">
        <div class="row gx-5">

            @foreach ($pesanan as $item)
                @if ($item->status == '0' || $item->status == '1' || $item->status == '2')
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card mb-5 " style="width: 18rem;">
                            <img src="{{ asset("storage/" . $item->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->nama_menu }}</h4>
                                <hr>
                                <h6>Pemesan: {{ $item->user->nama_lengkap }}</h6>
                                <h6>Jumlah porsi: {{ $item->kuantitas }}</h6>
                                <h6>Total harga: {{ $item->harga }}</h6>

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
                                        <input type="hidden" name="status" value="4">
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
                                    <form action="/dashboard/orderan/set-status/{{ $item->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="status" value="3">
                                        <button class="btn btn-primary w-100 mt-3 text-light" onclick="return confirm('Proses transaksinya sudah selesai?')">
                                            Pesanan diambil
                                        </button>
                                    </form>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    
    

@endsection