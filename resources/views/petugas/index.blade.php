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
                  <a href='/petugas/create' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">No</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">Role</th>
                            

                           
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($data as $item)
                        <tr>
                            <td>1</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->role}}</td>
                            
                        
                            <td>
                            <a href="{{ route('petugas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('petugas.destroy', $item->id )}}" method="POST" class="d-inline deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger deleteBtn">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                       
                        @endforeach
                    </tbody>
                </table>
               
               
          </div>
          <!-- AKHIR DATA -->

@endsection