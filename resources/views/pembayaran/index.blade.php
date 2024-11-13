@extends('kerangka.master')
@section  ('content')

 <!-- START DATA -->
 <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='/jenis/pembayaran/create' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">No</th>
                            <th class="col-md-2">Jenis Pembayaran</th>
                            <th class="col-md-2">Nama Pembayaran</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = $pembayaran->firstItem() ?>
                        @foreach ($pembayaran as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama_pembayaran}}</td>
                            <td>{{ $item->jenis_pembayaran}}</td>
                            <td>
                            <a href="{{ route('jenis.pembayaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jenis.pembayaran.destroy', $item->id )}}" method="POST" class="d-inline deleteForm">
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
               
          </div>
          <!-- AKHIR DATA -->

@endsection