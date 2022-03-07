<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KaSeT | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .carousel-item img {
            filter: brightness(50%);
        }
    </style>
</head>
<body>

    @include('partials/navbar')

    @include('partials/poster')

    <!-- Menu Semua Makanan Minuman Snack -->
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <p class="text-danger fs-1 fw-bolder text-center" style="font-weight: 900">Menu</p>
            </div>
        </div>

        <div class="container mt-3" id="menu">
            @yield('cardContainer')
        </div>
        
    </div>
    <!-- Akhir Menu Semua Makanan Minuman Snack --> 

    <!-- Tentang Kami About us -->
    <br id="tentang_kami">
    @auth
    
    @else
        <div class="container-fluid bg-secondary py-5 mt-4">
            <div class="row">
                <div class="col">
                    <p class="fw-bolder fs-1 text-light text-center">Tentang Kami</p>
                </div>
            </div>
            <div class="row justify-content-center px-4">
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <img src="https://blogpictures.99.co/makanan-khas-indonesia-header.png" alt="Gambar Kami" class="img-fluid">
                </div>
                <div class="col pe-5">
                    <p class="fs-2 fw-bolder text-light d-none d-lg-block">Siapa Kami?</p>
                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam distinctio error harum iste iusto laborum nam, necessitatibus nisi non odit omnis possimus praesentium repellendus tempora voluptatibus! Assumenda distinctio molestias saepe!</p>
                    <p class="text-light">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima ratione, minus culpa numquam, esse voluptatum magni nemo beatae non mollitia sunt exercitationem? Iusto eos magni repellat eaque praesentium sequi beatae.</p>
                </div>
            </div>
        </div>
        <!-- Akhir Tentang kami About us -->
        <!-- Didukung oleh Supported by -->
        <div class="container-fluid py-5 px-4">
            <div class="row">
                <div class="col">
                    <p class="fw-bolder fs-1 text-danger text-center">Didukung oleh</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center"><img height="64px" src="https://avatars.githubusercontent.com/u/63014604?s=200&v=4" alt="Logo Metrotech DIgital Asia"></div>
                <div class="col text-center"><img height="64px" src="https://www.pikpng.com/pngl/b/56-566268_logo-telkom-school-png-graphics-clipart.png" alt="Logo Telkom Schools Makassar"></div>
                <div class="col text-center"><img height="64px" src="https://upload.wikimedia.org/wikipedia/commons/c/c5/Logo_Yayasan_Pendidikan_Telkom.png" alt="Logo Logo_Yayasan_Pendidikan_Telkom"></div>
            </div>
        </div>
        <!-- Akhir Didukung oleh Supported by -->
        <!-- Footer Kontak Bagian bawah -->
        <div class="container-fluid bg-danger pt-5 px-4">
            <div class="row">
                <div class="col col-lg-6">
                    <p class="fs-1 fw-bold text-light ms-4">Kontak Kami</p>
                    <ul class="">
                        <li class="text-light list-unstyled"><i class="bi bi-geo-alt"></i> <a class="text-decoration-none text-light" target="_blank" href="https://www.google.com/maps/place/SMK+TELKOM+Makassar/@-5.1708206,119.4352354,19z/data=!4m13!1m7!3m6!1s0x2dbee28e2c2fa91b:0x83021032aa03ac5d!2sJl.+A.+P.+Pettarani+No.4,+Mannuruki,+Kec.+Tamalate,+Kota+Makassar,+Sulawesi+Selatan+90221,+Indonesia!3b1!8m2!3d-5.1698322!4d119.4327597!3m4!1s0x2dbee32da1a075d3:0x88e9cc6030cfa1dd!8m2!3d-5.1712763!4d119.4363863">Jl. A. P. Pettarani No.4, Gn. Sari, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90221, Indonesia</a></li>
                        <li class="text-light list-unstyled"><i class="bi bi-telephone"></i> <a class="text-decoration-none text-light" target="_blank" href="https://api.whatsapp.com/send/?phone=6282193895552&text&app_absent=0">+6282193895552</a></li>
                        <li class="text-light list-unstyled"><i class="bi bi-envelope"></i> <a class="text-decoration-none text-light" target="_blank" href="mailto:haysnairfailfar@gmail.com"> haysnairfailfar@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col col-lg-6">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p class="fw-bold fs-1 text-light">Follow IG Kami Di</p>
                            </div>
                            <div class="col">
                                <a class="btn btn-light text-dark" href="https://www.instagram.com/kasetmks/" target="_blank"><i class="bi bi-instagram"></i> kasetmks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <p class="text-light">&copy; 2022, MetroChild | <a class="text-decoration-none text-light fw-bold" href="#">Kantin Sekolah Telkom</a></p>
                </div>
            </div>
        </div>
        <!-- Akhir Footer Kontak Bagian bawah -->
    @endauth
    
    <!-- jQuery Bootstrap Popper Scrollspy -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                // var scroll = $(window).scrollTop();
                if ($(window).scrollTop()) {
                    $(".navbar").removeClass('bg-transparent').addClass('bg-danger').css('transition', '300ms');
                    $('#daftar').removeClass('btn-danger text-light').addClass('btn-light text-danger')
                }

                else{
                    $(".navbar").removeClass('bg-danger').addClass('bg-transparent');
                    $('#daftar').removeClass('btn-light text-danger').addClass('btn-danger text-light');
                }
            })
        })
    </script>
    <!-- Akhir Jquery Bootstrap Popper Scrollspy -->
</body>
</html>