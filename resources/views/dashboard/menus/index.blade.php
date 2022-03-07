@extends('dashboard/layouts/main')

@section('container')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Menu-menu {{ auth()->user()->nama_kantin }}</h1>
    </div>

    <div class="table-responsive">
      <a href="/dashboard/menus/create" class="btn btn-primary mb-5">Tambahkan menu baru</a>

      @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama menu</th>
              <th scope="col">Harga</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ $menu->harga }}</td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td>
                      @if ($menu->kategori == '1')
                          Makanan
                      @elseif($menu->kategori == '2')
                          Minuman
                      @else Snack
                      @endif  
                    </td>
                    <td>
                      <a href="/dashboard/menus/{{ $menu->uuid }}" class="badge bg-info mb-2 mt-2">
                        <span data-feather="eye"></span>
                      </a>

                      <form action="/dashboard/menus/edit/{{ $menu->uuid }}" method="get" class="d-inline">
                        @csrf
                        <button class="badge bg-warning mb-2 border-0">
                          <span data-feather="edit"></span>
                        </button>
                      </form>
                      
                      <form action="/dashboard/menus/delete/{{ $menu->uuid }}" method="post" class="d-inline">
                        @csrf
                        <button class="badge bg-danger mb-2 border-0" onclick="return confirm('Yakin ingin menghapus menu?')">
                          <span data-feather="trash"></span>
                        </button>
                      </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

@endsection