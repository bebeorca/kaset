<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaSeT | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        label {
            /color: black;/
            font-weight: bolder;
        }

        input {
            margin-bottom: 20px;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col text-center">
                <img class="img-fluid w-25" src="/img/hitam.png" alt="Logo KaSeT">
            </div>
        </div>
        <form action="/register" method="post">
            @csrf
        <div class="">
            <div class="col">
                <p class="text-center fw-bolder fs-1 mt-5">Halaman Registrasi</p>
            </div>
            <div class="w-100"></div>
         </div>
             <div class="row border-sm shadow-lg px-5" style="border-radius: 20px">
                <div class="col-auto m-auto">
                    <p class="text-danger text-center fs-2 border-bottom border-4 border-danger mt-3" style="font-weight: bolder;">Data Diri dan Kantin</p>
                </div>
                 <div class="w-100"></div>

                 <input type="hidden" name="user_id" class="form-control" id="nama_lengkap" value="2">
                 <input type="hidden" name="nama_lengkap" class="form-control" id="nama_lengkap" value="--">
                 <input type="hidden" name="nis" class="form-control" id="nis" value="{{ random_int(0, 999) }}">
                 <input type="hidden" name="kelas" class="form-control" id="kelas" value="--">

                <div class="col mt-3">
                    <label for="nama_kantin" class="form-label">Nama Kantin <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="text" name="nama_kantin" class="form-control @error('nama_kantin') is-invalid @enderror" id="nama_kantin" placeholder="Nama Kantin" value="{{ old('nama_kantin') }}">
                    @error('nama_kantin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <label for="nama_pemilik" class="form-label">Nama Pemilik <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="text" name="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" placeholder="Nama Pemilik" value="{{ old('nama_pemilik') }}">
                    @error('nama_pemilik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon<sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="tel" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}">
                    @error('nomor_telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100"></div>
                <div class="col-auto m-auto mt-3">
                    <p class="text-danger text-center fs-2 border-bottom border-danger border-4" style="font-weight: bolder;">Data Akun</p>
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <label for="username" class="form-label">Nama Pengguna <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Nama Pengguna" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100"></div>
                 <div class="col">
                    <label for="password" class="form-label">Kata Sandi <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Kata Sandi" value="{{ old('passworwd') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="konfirmasi_password" class="form-label">Konfirmasi Kata Sandi <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="password" name="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" placeholder="Konfirmasi Kata Sandi" value="{{ old('konfirmasi_password') }}">
                    @error('konfirmasi_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <button type="submit" class="btn btn-danger w-100 m-auto my-5 fs-3 px-5" style="border-radius: 5px;">Daftar</button>
                </div>
            </div>
            <div class="col text-center mt-5">
                <p>&copy; 2022, MetroChild | <a href="#" class="text-danger text-decoration-none">Kantin Sekolah Telkom</a></p>
                <br>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>