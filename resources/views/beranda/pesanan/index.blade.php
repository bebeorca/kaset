<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
        body {
            font-family: 'Poppins', sans-serif;
        }
    
        .porsi:disabled {
            background-color: transparent;
            border: none;
        }

    </style>
    <title>Pesanan</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-danger">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="/">
            <img width="128" src="/img/hitam.png" alt="Logo KaSeT">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

    <div class="container" style="margin-top: 100px">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->has('limit'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('limit') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="container mb-5" style="margin-top: 100px;">
        <div class="row gy-4">
            @foreach ($menus as $menu)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card" style="border-radius: 0px 0px 20px 20px;">
                    <form action="/dashboard/orderan/confirm/{{ $menu->nama_kantin }}" method="post">
                        @csrf
                        @if ($menu->gambar)
                            <img class="w-100" src="{{ asset("storage/" . $menu->gambar) }}" height="200px" alt="">
                            <input type="hidden" name="gambar" value="{{ $menu->gambar }}">
                        @else
                            <img class="w-100" src="https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png" height="200px" alt="">
                            <input type="hidden" name="gambar" value="https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title text-danger">{{ $menu->nama_menu }}</h4>
                            <input type="hidden" name="nama_menu" value="{{ $menu->nama_menu }}">
                            <p class="card-text">{{ $menu->nama_kantin }}</p>
                            <div class="d-flex justify-content-between mt-4">
                                <div>
                                    <label for="kuantitas">Porsi:</label> 
                                    <input type="number" name="kuantitas" id="kuantitas" value="1" class="kuantitas" min="1" autofocus onchange="changeValue()" style="width: 40px; height: 25px">
                                </div>
                                
                                <input type="text" name="harga" id="harga" class="h5 text-dark" style="outline:none; border:0;width:60px" dir="rtl" value="{{ $menu->harga / 1000 . "K" }}" readonly>

                                

                            </div>
                        </div>
                        <div class="container card-footer py-3" style="background-color: gray; border-radius: 0px 0px 20px 20px;">
                            <p class="text-center text-light mb-2">Belum dikonfirmasi</p>
                            <div class="row gx-2">
                                <div class="col order-1">
                        
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="nama_kantin" value="{{ $menu->nama_kantin }}">
                        <input type="hidden" name="kantin_id" value="{{ $menu->kantin_id }}">
                        <input type="hidden" name="status" value="0">

                        <button type="submit" class="btn btn-success w-100">Konfirmasi</button>
                    </form>
                            </div>
                            <div class="col order-0">
                                <form action="/dashboard/orderan/delete/{{ $menu->nama_kantin }}" method="post">
                                    @csrf
                                    <input type="hidden" name="nama_kantin" value="{{ $menu->nama_kantin }}">
                                    <button type="submit" class="btn btn-danger w-100">Batalkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        @if ($menu->harga)
                    <script>    

                        function changeValue(){
                            var kuantitas = document.querySelector('#kuantitas');
                            var hargaAkhir = document.querySelector('#harga');
                            var harga = {{ $menu->harga }} * kuantitas.value / 1000;
                            
                            hargaAkhir.value = harga + "K";
                        }

                    </script>
                @endif
                
                @endforeach
                @foreach ($myPesanan as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card position-relative" style="border-radius: 0px 0px 20px 20px;">
                            <!-- <a href="#" class="position-absolute top-0 end-0"><i class="bi bi--circle-fill"></i>a</a> -->
                            @if ($item->status == '3' || $item->status == '4')
                                <form action="/dashboard/orderan/delete-finish-user/{{ $item->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="position-absolute translate-middle top-0 start-100" onclick="return confirm('Hapus data pesanan?')" style="border: none; background-color: transparent;"><i class="bi bi-x-circle-fill fs-3 text-danger"></i></button>
                                </form>
                            @endif
                            @if ($item->gambar)
                                <img class="w-100" src="{{ asset("storage/" . $item->gambar) }}" height="200px" alt="">
                                <input type="hidden" name="gambar" value="{{ $item->gambar }}">
                            @else
                                <img class="w-100" src="https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png" height="200px" alt="">
                                <input type="hidden" name="gambar" value="https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title text-danger">{{ $item->nama_menu}}</h4>
                                <p class="card-text">{{ $item->kantin->nama_kantin }}</p>
                                <div class="d-flex justify-content-between mt-4">
                                    <div>
                                        <label for="porsi">Porsi:</label> 
                                        <input type="number" name="porsi" class="porsi text-dark" min="1" style="width: 40px; height: 25px;background-color:transparent;border:none;" disabled value="{{ $item->kuantitas }}">
                                    </div>
                                    <h5>{{ $item->harga }}</h5>
                                </div>
                            </div>
                            @if ($item->status == '0')
                                <div class="container card-footer py-3" style="background-color: gray; border-radius: 0px 0px 20px 20px;">
                                    <p class="text-center text-light mb-2" style="position: relative; top: 20px;">Tunggu konfirmasi dari kantin, ya</p>
                                    <div class="row gx-2 invisible">
                                        <div class="col order-0">
                                            <form action="">
                                                <button type="submit" class="btn btn-danger w-100">Batalkan</button>
                                            </form>
                                        </div>
                                        <div class="col order-1">
                                            <form action="">
                                                <button type="submit" class="btn btn-success w-100">Konfirmasi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @elseif($item->status == '1')
                                <div class="container card-footer py-3" style="background-color: rgb(255, 81, 0); border-radius: 0px 0px 20px 20px;">
                                    <p class="text-center text-light mb-2" style="position: relative; top: 20px;">Pesananmu sedang disiapkan</p>
                                    <div class="row gx-2 invisible">
                                        <div class="col order-0">
                                            <form action="">
                                                <button type="submit" class="btn btn-danger w-100">Batalkan</button>
                                            </form>
                                        </div>
                                        <div class="col order-1">
                                            <form action="">
                                                <button type="submit" class="btn btn-success w-100">Konfirmasi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @elseif($item->status == '2')
                                <div class="container card-footer py-3 bg-success" style="background-color: gray; border-radius: 0px 0px 20px 20px;">
                                    <p class="text-center text-light mb-2" style="position: relative; top: 20px;">Pesananmu sudah siap diambil</p>
                                    <div class="row gx-2 invisible">
                                        <div class="col order-0">
                                            <form action="">
                                                <button type="submit" class="btn btn-danger w-100">Batalkan</button>
                                            </form>
                                        </div>
                                        <div class="col order-1">
                                            <form action="">
                                                <button type="submit" class="btn btn-success w-100">Konfirmasi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @elseif($item->status == '3')
                                <div class="container card-footer py-3 bg-primary" style="background-color: gray; border-radius: 0px 0px 20px 20px;">
                                    <p class="text-center text-light mb-2" style="position: relative; top: 20px;">Selesai</p>
                                    <div class="row gx-2 invisible">
                                        <div class="col order-0">
                                            <form action="">
                                                <button type="submit" class="btn btn-danger w-100">Batalkan</button>
                                            </form>
                                        </div>
                                        <div class="col order-1">
                                            <form action="">
                                                <button type="submit" class="btn btn-success w-100">Konfirmasi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @elseif($item->status == '4')
                                <div class="container card-footer py-3 bg-danger" style="background-color: gray; border-radius: 0px 0px 20px 20px;">
                                    <p class="text-center text-light mb-2" style="position: relative; top: 20px;">Yaa, pesananmu tidak dikonfirmasi</p>
                                    <div class="row gx-2 invisible">
                                        <div class="col order-0">
                                            <form action="">
                                                <button type="submit" class="btn btn-danger w-100">Batalkan</button>
                                            </form>
                                        </div>
                                        <div class="col order-1">
                                            <form action="">
                                                <button type="submit" class="btn btn-success w-100">Konfirmasi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    

</body>
</html>