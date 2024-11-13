@extends('kerangka.master')
@section  ('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Transaksi</h2>
   <a href="{{ route('transaksi.create.admin') }}">Tambah Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Metode Bayar</th>
                <th>Total Harga</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->nama_barang }}</td>
                    <td>{{ $transaksi->jumlah_produk }}</td>
                    <td>{{ $transaksi->metode_bayar }}</td>
                    <td>{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $transaksi->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

