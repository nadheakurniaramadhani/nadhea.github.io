@extends('kerangka.master')
@section  ('content')
 <!-- START DATA -->
 <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                @if (Session::has('success'))
                <div class="pt-3">
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                </div>
                @endif

                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='/konsumen/create' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">No</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">email</th>
                            <th class="col-md-2">jenis kelamin</th>
                            <th class="col-md-2">alamat</th>
                            <th class="col-md-2">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->jk}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>
                            <a href="{{ route('konsumen.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('konsumen.destroy', $item->id )}}" method="POST" class="d-inline deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger deleteBtn">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
               
          </div>
          <!-- AKHIR DATA -->

@endsection