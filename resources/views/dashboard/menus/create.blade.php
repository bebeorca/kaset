@extends('dashboard/layouts/main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah menu baru</h1>
    </div>

    <div class="col-lg-8">

        <form action="/dashboard/menus/tambah-menu" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama_menu" class="form-label">Nama menu</label>
              <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id="nama_menu" name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Nama Menu" required autofocus>
              @error('nama_menu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="kategori" class="form-label">Kategori menu</label>
              <select class="form-select" id="kategori" name="kategori" required>
                <option value="{{ old('kategori') }}">--</option>
                <option value="1">Makanan</option>
                <option value="2">Minuman</option>
                <option value="3">Snack</option>
              </select>
              @error('kategori')
                <p class="text-danger">{{ $message }}</p>  
              @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div> --}}

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" placeholder="cth:(125000/10000)" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" name="deskripsi" required>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Foto menu</label>
                <img class="gambar-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" id="gambar" name="gambar" @error('gambar') is-invalid @enderror onchange="previewGambar()">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-5 mt-3 form-control">Tambah menu</button>
        </form>
    </div>

    <script>
        function previewGambar(){
            
            const gambar = document.querySelector("#gambar");
            const gambarPreview = document.querySelector(".gambar-preview");

            gambarPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function (oFREvent){
                gambarPreview.src = oFREvent.target.result;
            }
        }


    </script>

@endsection