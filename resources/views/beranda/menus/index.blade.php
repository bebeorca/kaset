<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-auto">
                <a href="/#menu" class="text-decoration-none fs-2 link-danger fw-bold"><i class="bi bi-arrow-bar-left text-dark"></i> Kembali</a>
            </div>
        </div>
        <div class="row gx-0 justify-content-center mt-4">
            <div class="col col-md-auto text-center mt-3"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'semua' ? 'link-light bg-danger' : '' }}" style="border-radius: 20px;" id="pilihan-menu1" href="/menus">Semua</a></div>
            <div class="col col-md-auto text-center mt-3"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'makanan' ? 'link-light bg-danger' : '' }}" style="border-radius: 20px;" id="pilihan-menu2" href="/menus/makanan">Makanan</a></div>
            <div class="col col-md-auto text-center mt-3"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'minuman' ? 'link-light bg-danger' : '' }}" style="border-radius: 20px;" id="pilihan-menu3" href="/menus/minuman">Minuman</a></div>
            <div class="col col-md-auto text-center mt-3"><a class="text-decoration-none fs-5 link-danger fw-bold pilihan-menu px-3 py-2 {{ $act == 'snack' ? 'link-light bg-danger' : '' }}" style="border-radius: 20px;" id="pilihan-menu4" href="/menus/snack">Snack</a></div>
        </div>
        <div class="row mt-5">
            @foreach ($menus as $menu)
                <div class="col-12 col-md-6 col-lg-4 mb-5">
                    <div class="card" style="border-radius: 20px;">
                        <p class="text-danger fw-bold fs-5 position-absolute top-0 end-0 me-3 mt-2 bg-light px-2" style="z-index: 10; border-radius:50px">{{ $menu->harga / 1000 . 'K' }}</p>
                        @if ($menu->gambar)
                            <div class="card" style="height: 200px; background-image: url('{{ asset("storage/" . $menu->gambar) }}'); background-size: cover; background-repeat: no-repeat; background-position: center; border-radius: 20px 20px 0px 0px;"></div>
                        @else 
                            <div class="card" style="height: 200px; background-image: url('https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png'); background-size: cover; background-repeat: no-repeat; background-position: center; border-radius: 20px 20px 0px 0px;"></div>
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
    </div>

    <div class="d-flex justify-content-center">
        {{ $menus->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        window.addEventListener( "pageshow", function ( event ) {
        var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>