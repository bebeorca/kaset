@extends('dashboard/layouts/main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit menu</h1>
    </div>

    <div class="col-lg-8">

        <form action="/dashboard/menus/edit/{{ $menu->uuid }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama_menu" class="form-label">Nama menu</label>
              <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id="nama_menu" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" placeholder="cth:(Ayam Geprek/Nasi Goreng/Mi Kuah)" required autofocus>
              @error('nama_menu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="kategori" class="form-label">Kategori menu</label>
              <select class="form-select" id="kategori" name="kategori" required>
                  @if ($menu->kategori == '1')
                    <option value="{{ old('kategori', $menu->kategori) }}">Makanan</option>
                    <option value="2">Minuman</option>
                    <option value="3">Snack</option>

                  @elseif($menu->kategori == '2')
                    <option value="{{ old('kategori', $menu->kategori) }}">Minuman</option>
                    <option value="1">Makanan</option>
                    <option value="3">Snack</option>

                  @elseif($menu->kategori == '3')
                    <option value="1">Makanan</option>
                    <option value="2">Minuman</option>
                    <option value="{{ old('kategori', $menu->kategori) }}">Snack</option>
                  @endif
                
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
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $menu->harga) }}" placeholder="cth:(12000/10000/8000)" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ old('deskripsi', $menu->deskripsi) }}" name="deskripsi" required>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="gambar" class="form-label">Foto menu</label>
              <input type="hidden" name="gambarLama" value="{{ $menu->gambar }}">
              @if ($menu->gambar)
                <img src="{{ asset("storage/" . $menu->gambar) }}" class="gambar-preview img-fluid mb-3 col-sm-5 d-block w-25">  
              @else
                <img src="/img/merah.png" class="gambar-preview img-fluid mb-3 col-sm-5 d-block w-25">  
              @endif
              <input class="form-control" type="file" id="gambar" name="gambar" @error('gambar') is-invalid @enderror onchange="previewGambar()">
              @error('gambar')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>

            <button type="submit" class="btn btn-primary mb-5">Simpan perubahan</button>
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