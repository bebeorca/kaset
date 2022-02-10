<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>KaSeT | {{ $title }}</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
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
                    <a class="nav-link active" aria-current="page" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="#menu">Menu</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="#tentang_kami">Tentang Kami</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Halo, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-in-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="/login"><button id="daftar" class="btn btn-danger text-light py-1 px-3">Login</button></a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
  </nav>
      
  <div class="mt-3 mb-3">
    <h1 class="text-center" style="color: #B7282C; font-weight: 700; margin-top: 100px;">PROFIL KAMU</h1>
    </div>
  
      <div class="container border shadow-lg" style="border-radius: 20px;">
        <!-- Awal Input Profile -->
        <form action="" method="post">
          <div class="form-group">
            <div class="ms-3">
              <div class="p-3">
                <label for="exampleInputEmail1" class="form-label" style="font-size:larger;">Nama Lengkap</label>
                <input type="text" placeholder="Nama Lengkap" class="form-control" id="name" value="{{ auth()->user()->nama_lengkap }}">
              </div>
              <div class="p-3">
                <label for="exampleInputEmail1" class="form-label" style="font-size:larger;">Nama Panggilan</label>
                <input type="text" placeholder="Nama Panggilan" class="form-control" id="nickname" value="{{ auth()->user()->nama_panggilan }}">
              </div>

              <div class="container">
                <div class="row">
                  <div class="col">
                    <label for="exampleInputEmail1" class="form-label" style="font-size:larger;">Kelas</label>
                   <input type="text" placeholder="Kelas" class="form-control" id="Class" value="{{ auth()->user()->kelas }}">
                  </div>
                  <div class="col">
                    <label for="exampleInputEmail1" class="form-label" style="font-size:larger;">Username</label>
                   <input type="text" placeholder="Username" class="form-control" id="username" value="{{ auth()->user()->username }}">
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col mt-3">
                    <label for="exampleInputEmail1" class="form-label" style="font-size:larger;">Nomor Telepon</label>
                    <input type="tel" placeholder="Nomor Telepon" class="form-control" id="phone" value="{{ auth()->user()->nomor_telepon }}">
                  </div>
                  <div class="col mt-3">
                    <label for="exampleInputEmail1" class="form-label" style="font-size:larger;">Password</label>
                    <input type="password" placeholder="Password" class="form-control" id="pass">
                    <label for="exampleInputEmail1" class="form-label mt-2" style="font-size:larger;">Konfirmasi Password</label>
                    <input type="password" placeholder="Konfirmasi Password" class="form-control" id="pass">
                  </div>
                </div>
              </div>
              
          </div>
          </div>
        </form>
        <!-- Akhir Input Profile -->
      <!--Awal Button-->
      <div class="d-grid gap-2 col-6 mx-auto mb-5 mt-5">
        <button class="btn btn-primary" type="button" style="background-color: #B7282C; ">Ubah</button>
      </div>
      <!-- Akhir Button -->
      </div>

      <br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>