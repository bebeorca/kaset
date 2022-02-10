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
            /*color: black;*/
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
                <img class="img-fluid w-25 mt-5" src="https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png" alt="Logo KaSeT">
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
                     <p class="text-danger text-center fs-2 border-bottom border-4 border-danger mt-3" style="font-weight: bolder;">Data Diri Anda</p>
                 </div>
                 <div class="w-100"></div>
                <div class="col">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}" autofocus>
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <label for="nama_panggilan" class="form-label">Nama Panggilan <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" value="{{ old('nama_panggilan') }}">
                    @error('nama_panggilan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="nis" class="form-label">NIS <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" placeholder="NIS" value="{{ old('nis') }}">
                    @error('nis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                 <div class="w-100"></div>
                 <div class="col">
                     <label for="kelas" class="form-label">Kelas <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                        <select required class="form-select" name="kelas" id="kelas" >
                            <option value="{{ old('kelas') }}">--</option>
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
                     @error('kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                     @enderror
                 </div>
                 <div class="col">
                     <label for="nomor_telepon" class="form-label">Nomor Telepon <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                     <input required type="tel" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}">
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
                    <input required type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Nama Pengguna">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                 <div class="w-100"></div>
                 <div class="col">
                    <label for="password" class="form-label">Kata Sandi <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Kata Sandi">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="konfirmasi_password" class="form-label">Konfirmasi Kata Sandi <sup><i class="bi bi-asterisk text-danger"></i></sup></label>
                    <input required type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Kata Sandi">
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