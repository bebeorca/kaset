@extends('dashboard/layouts/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orderan yang telah selesai untuk {{  auth()->user()->nama_kantin  }}</h1>
    </div>

    <div class="container">
        <div class="row gx-5">

            @foreach ($pesanan as $item)
                @if ($item->status == '3' || $item->status == '4')
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card mb-5 " style="width: 18rem;">
                            <img src="{{ asset("storage/" . $item->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->nama_menu }}</h4>
                                <hr>
                                <h6>Pemesan: {{ $item->user->nama_lengkap }}</h6>
                                <h6>Jumlah porsi: {{ $item->kuantitas }}</h6>
                                <h6>Total harga: {{ $item->harga }}</h6>

                                <form action="/dashboard/orderan/delete-finish/{{ $item->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                        @if ($item->status == '3')
                                            <button class="btn btn-primary w-100 mt-3 text-light">
                                                Selesai.
                                            </button>
                                        @elseif($item->status == '4')
                                            <button class="btn btn-danger w-100 mt-3 text-light">
                                                Orderan tidak dikonfirmasi.
                                            </button>
                                        @endif 
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection