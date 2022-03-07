<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>body{font-family: 'Poppins', sans-serif;}</style>
    <title>KaSeT | {{ $title }}</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark" style="background-color: #B7282C;">
        <div class="container">
          <a class="navbar-brand" href="/"> <img src="" alt="LOGO"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="27.09" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16" style="color: white;">
                  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                </svg></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pesanan.html"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="27.09" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16" style="color: white;">
                  <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="mt-3 mb-3">
      <h1 class="text-center" style="color: #B7282C; font-weight: 700;">PROFIL KAMU</h1>
      </div>

      <div class="container border shadow-lg" style="border-radius: 20px;">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Awal Input Profile -->
            @if (auth()->user()->user_id == '1')
                <div class="form-group">
                  <div class="p-3">
                    <form action="/user-profile-update/{{ $user->uuid }}" method="POST">
                      @csrf
                      <div class="p-3">
                        <label for="nama_lengkap" class="form-label" style="font-size:medium;">Nama Lengkap</label>
                        <input type="text" placeholder="Nama Lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}" autofocus>
                        </div>
                        <div class="ms-3 me-3 mb-3">
                          <label for="kelas" class="form-label">Kelas <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                          <select required class="form-select" name="kelas" id="kelas" >
                              <option value="{{ $user->kelas }}">{{ $user->kelas }}</option>
                              <option value="X RPL 1">X RPL 1</option>
                              <option value="X RPL 2">X RPL 2</option>
                              <option value="X RPL 3">X RPL 3</option>
                              <option value="X TEL">X TEL</option>
                              <option value="X TJA">X TJA</option>
                              <option value="X TKJ 1">X TKJ 1</option>
                              <option value="X TKJ 2">X TKJ 2</option>
                              <option value="X TKJ 3">X TKJ 3</option>
                              <option value="X TKJ 4">X TKJ 4</option>
                              <option value="X TKJ 5">X TKJ 5</option>
                              <option value="X UPW">X UPW</option>
                              <option value="XI PAR">XI PAR</option>
                              <option value="XI RPL">XI RPL</option>
                              <option value="XI TEL 1">XI TEL 1</option>
                              <option value="XI TEL 2">XI TEL 2</option>
                              <option value="XI TEL 3">XI TEL 3</option>
                              <option value="XI TJA 1">XI TJA 1</option>
                              <option value="XI TJA 2">XI TJA 2</option>
                              <option value="XI TKJ 1">XI TKJ 1</option>
                              <option value="XI TKJ 2">XI TKJ 2</option>
                              <option value="XI TKJ 3">XI TKJ 3</option>
                              <option value="XI TKJ 4">XI TKJ 4</option>
                              <option value="XI TKJ 5">XI TKJ 5</option>
                              <option value="XII PAR 1">XII PAR 1</option>
                              <option value="XII PAR 2">XII PAR 2</option>
                              <option value="XII TEL 1">XII TEL 1</option>
                              <option value="XII TEL 2">XII TEL 2</option>
                              <option value="XII TEL 3">XII TEL 3</option>
                              <option value="XII TJA 1">XII TJA 1</option>
                              <option value="XII TJA 2">XII TJA 2</option>
                              <option value="XII TKJ 1">XII TKJ 1</option>
                              <option value="XII TKJ 2">XII TKJ 2</option>
                              <option value="XII TKJ 3">XII TKJ 3</option>
                              <option value="XII TKJ 4">XII TKJ 4</option>
                              <option value="XII TKJ 5">XII TKJ 5</option>
                          </select>
                        </div>
                        
                        <div class="container mb-3">
                          <div class="row">
                              <div class="col">
                                <label for="nomor_telepon" class="form-label" style="font-size:medium;">Nomor Telepon</label>
                                <input type="tel" placeholder="Nomor Telepon" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $user->nomor_telepon }}">
                              </div>
                              <div class="col">
                                <label for="nis" class="form-label" style="font-size:medium;">NIS</label>
                                <input type="tel" placeholder="Nomor Telepon" class="form-control" id="nis" name="nis" value="{{ $user->nis }}">
                              </div>
                          </div>
                        </div>

                        <div class="ms-3 me-3 mb-3">
                        <label for="username" class="form-label" style="font-size:medium;">Username</label>
                        <input type="text" placeholder="Username" class="form-control" name="username" id="username" value="{{ $user->username }}">
                        {{-- </div>
                        <input type="hidden" name="uuid" value="{{ $user->uuid }}">
                        <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                        <input type="hidden" name="password" value="{{ $user->password }}">
                        <input type="hidden" name="nama_kantin" value="{{ $user->nama_kantin }}">
                        <input type="hidden" name="nama_pemilik" value="{{ $user->nama_pemilik }}"> --}}
                        <div class="d-grid gap-2 mx-auto mb-5 mt-5">
                          <button class="btn btn-primary" type="submit" style="background-color: #B7282C; border: 0px;">Ubah</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="form-group">
                    <div class="p-3">
                      <form action="/kantin-update-profile/{{ $user->uuid }}" method="POST">
                        @csrf
                        <div class="ms-3 me-3 mb-3">
                          <label for="nama_pemilik" class="form-label" style="font-size:medium;">Nama Pemilik</label>
                          <input type="text" placeholder="Nama Pemilik" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ $user->nama_pemilik }}">
                        </div>
                          <div class="ms-3 me-3 mb-3">
                            <label for="nama_kantin" class="form-label" style="font-size:medium;">Nama Kantin</label>
                            <input type="text" placeholder="Nama Kantin" class="form-control" id="nama_kantin" name="nama_kantin" value="{{ $user->nama_kantin }}">
                          </div>
                          <div class="ms-3 me-3 mb-3">
                            <label for="nomor_telepon" class="form-label" style="font-size:medium;">Nomor Telepon</label>
                            <input type="tel" placeholder="Nomor Telepon" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $user->nomor_telepon }}">
                          </div>
                          <div class="ms-3 me-3 mb-3">
                            <label for="username" class="form-label" style="font-size:medium;">Username</label>
                            <input type="text" placeholder="Username" class="form-control" id="username" name="username" value="{{ $user->username }}">
                          </div>
                          <div class="d-grid gap-2 mx-auto mb-5 mt-5">
                            <button class="btn btn-primary" type="submit" style="background-color: #B7282C; border: 0px;">Ubah</button>
                          </div>
                      </form>
                    </div>
                </div>
            @endif
        <!-- Akhir Input Profile -->
      <!--Awal Button-->
      {{-- <div class="d-grid gap-2 mx-auto mb-5 mt-5">
        <button class="btn btn-primary" type="button" style="background-color: #B7282C; border: 0px;">Ubah</button>
      </div> --}}
      <!-- Akhir Button -->
      </div>

      <br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>