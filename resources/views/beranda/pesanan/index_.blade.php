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
    body{font-family: 'Poppins', sans-serif;}
    
    </style>
    <title>Pesanan</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-danger">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="#">
            <img width="128" src="" alt="Logo KaSeT">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="/beranda.html">Beranda</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="/beranda.html#menu">Menu</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="/beranda.html#tentang_kami">Tentang Kami</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="/registrasi.html"><button id="daftar" class="btn btn-light text-danger py-1 px-3">Daftar</button></a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

@foreach ($menus as $menu)
<div class="container" style="margin-top: 100px;">

    <div class="card shadow my-5" style="border-radius: 20px;">
        <div class="row gx-0">
            <div class="col-md-4 text-center">
                @if ($menu->gambar)
                    <img class="w-100" src="{{ asset("storage/" . $menu->gambar) }}" height="200px" alt="">
                @else
                    <img class="w-100" src="https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png" height="200px" alt="">
                @endif
                
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <div class="row justify-content-between mt-4 align-items-center px-3">
                    <div class="col-auto">
                        <h1 style="color: #B7282C">{{ $menu->nama_menu }}</h1>
                    </div>
                    <div class="col-auto">
                        <label>Porsi:</label> <input type="number" name="kuantitas" style="width: 40px; height: 20px;" min="1">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-auto">... Warung</div>
                    <div class="col-auto">$harga</div>
                </div>
                <div class="card-footer w-100 text-center text-light mt-4 d-flex flex-sm-row flex-column justify-content-between align-items-baseline" style="border-radius: 0 0 20px 0; background-color: gray;">
                    <p>Belum dikonfirmasi</p>
                    <div class="d-none d-sm-block">
                        <button type="submit" class="btn btn-danger">Batalkan</button> 
                        <form action="">
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    </div>
                    <div class="container d-sm-none">
                        <div class="row">
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
                </div>
            </div>
        </div>
    </div>
    
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endforeach
    
</body>
</html>