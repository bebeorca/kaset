<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>KaSeT | {{ $title }}</title>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-4 mb-5">
            <div class="col text-center">
                <img class="img-fluid w-25" src="/img/hitam.png" alt="Logo KaSeT">
            </div>
        </div>
<!--        <div class="row d-none d-md-block">-->
<!--            <div class="col"></div>-->
<!--        </div>-->

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row align-items-center justify-content-around">
            <div class="col-12 col-md-8 col-lg-6">
                <form action="/login" method="post">
                    @csrf
                    <div class="container pt-4 border shadow-sm" style="border-radius: 20px">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <p class="fs-2 fw-bolder">Ayooo Login</p>
                            </div>
                            <div class="col-auto">
                                <a href="/register" class="text-danger text-decoration-none fw-bolder">Daftar</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="username" class="form-label">Nama pengguna</label>
                                <input required class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" autofocus>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>    
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="password" class="form-label mt-3">Kata Sandi</label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password" required >
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>    
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <button type="submit" class="btn btn-danger text-light w-100 my-4">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="row" style="position: absolute; text-align: center; bottom: 5%; left: 0px; width: 100%">
                <p>&copy; 2022, MetroChild | <a href="#" class="text-danger text-decoration-none">Kantin Sekolah Telkom</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>