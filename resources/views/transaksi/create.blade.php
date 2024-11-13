<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Transaksi</h2>
        <!-- Form input data produk -->
        <div class="row mb-3">
            <div class="col-md-4">
            <form method="GET" action="">
            <select name="id" id="id" class="form-control">
                @foreach($barangs as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                @endforeach
            </select>
            <button type="submit">Tambah</button>
        </form>
            </div>
            <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <input type="hidden" name="transaksi_id" value="{{ Request::segment('2') }}">

            <div class="col-md-4">
                <label for="nama_barang" class="form-label">Nama Barang:</label>
                <input type="text" class="form-control" value="{{ isset($p_detail) ? $p_detail->nama_produk : '' }}" id="nama_barang" name="nama_barang" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="harga_jual" class="form-label">Harga Jual:</label>
                <input type="text" class="form-control" value="{{  isset($p_detail) ? $p_detail->harga_jual : '' }}" id="harga_jual" name="harga_jual" readonly>
            </div>
            <div class="col-md-4">
                <label for="stok" class="form-label">Stok:</label>
                <input type="text" class="form-control" value="{{  isset($p_detail) ? $p_detail->stok : '' }}" id="stok" name="stok" readonly>
            </div>
            <div class="col-md-4">
                <label for="jumlah" class="form-label">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <!-- <div class="col-md-4">
                <label for="subtotal" class="form-label">Sub Total:</label>
                <input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
            </div> -->
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">+ ADD</button>
            </div>
        </div>
        </form>
        <div class="row p-2">
                    <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>nama pprduk</th>
                        <th>jumlah</th>
                        <th>subtotal </th>
                    </tr>
                    @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->nama_barang }}</td>
                    <td>{{ $transaksi->jumlah_produk }}</td>
                    <td>{{ $transaksi->total_harga }}</td>
                </tr>
            @endforeach
                </table>
                <a href="{{route('transaksi.index')}}" class="btn btn-primary fas fa-chechk">selesai</a>
                <a href="" class="btn btn-success">pending</a>
            </div>
        </div>
        </div>


        <!-- Tabel transaksi -->
        <table class="table table-bordered mt-4">
            <tbody id="transaksiTable">
                <!-- Data akan dimasukkan menggunakan JavaScript -->
            </tbody>
        </table>

        <div class="row mt-4">
            <div class="col-md-4">
                <label for="total_harga" class="form-label">Total Harga:</label>
                <input type="text" value="" class="form-control" id="total_harga" name="total_harga" readonly>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <label for="jumlah_bayar" class="form-label">Jumlah Bayar:</label>
                <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar">
            </div>
            <div class="col-md-4">
                <label for="kembalian" class="form-label">Kembalian:</label>
                <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
            </div>
            <div class="col-md-4">
                <label for="kembalian" class="form-label">Metode Bayar</label>
                <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100">Selesai dan Simpan</button>
            </div>
        </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Transaksi</h2>
    
    <!-- Mendapatkan data barang dari server -->
    <?php
        // Simpan produk yang sudah ditambahkan ke dalam session
        session_start();
        if (!isset($_SESSION['transaksi'])) {
            $_SESSION['transaksi'] = [];
        }

        // Cek jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data input
            $namaBarang = $_POST['nama_barang'];
            $hargaJual = (float) $_POST['harga_jual'];
            $jumlah = (int) $_POST['jumlah'];
            $subtotal = $hargaJual * $jumlah;

            // Simpan data ke dalam session
            $_SESSION['transaksi'][] = [
                'nama_barang' => $namaBarang,
                'harga_jual' => $hargaJual,
                'jumlah' => $jumlah,
                'subtotal' => $subtotal
            ];
        }

        // Hitung total barang dan total harga
        $totalBarang = 0;
        $totalHarga = 0;
        foreach ($_SESSION['transaksi'] as $transaksi) {
            $totalBarang += $transaksi['jumlah'];
            $totalHarga += $transaksi['subtotal'];
        }
    ?>
</body>
</html>
