@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header text-bg-dark">
        <h5 class="mb-0">Panduan Penggunaan Sistem</h5>
    </div>
    <div class="card-body">
        
        <h6 class="fw-bold mt-2">Cara menambah barang baru</h6>
        <ol>
            <li>Buka halaman <strong>Dashboard</strong>, klik tombol <strong>+ Tambah Barang</strong> di kanan atas.</li>
            <li>Unggah foto barang (opsional), lalu isi formulir: nama, kategori, satuan, jumlah stok, harga, dan lainnya.</li>
            <li>Klik <strong>Simpan Barang</strong>. Barang akan muncul di daftar dashboard.</li>
        </ol>

        <hr class="my-4">

        <h6 class="fw-bold">Cara update stok barang masuk</h6>
        <ol>
            <li>Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</li>
            <li>Klik tombol <strong>Edit</strong> pada baris barang tersebut.</li>
            <li>Ubah nilai <strong>Jumlah stok</strong> sesuai kondisi saat ini, lalu klik <strong>Update Barang</strong>.</li>
        </ol>

        <hr class="my-4">

        <h6 class="fw-bold">Cara mengelola kategori</h6>
        <ol>
            <li>Buka halaman <strong>Kategori</strong> dari navigasi atas.</li>
            <li>Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</li>
            <li>Menghapus kategori tidak akan menghapus barang — barang akan menjadi tidak berkategori.</li>
        </ol>

        <div class="alert alert-light border mt-4 d-flex align-items-center" role="alert">
            <small class="text-muted">Satuan barang diisi bebas sesuai kebutuhan — misalnya: pcs, pack, box, kg, liter, dan lain-lain.</small>
        </div>

    </div>
</div>

<div class="card border-info">
    <div class="card-body bg-light">
        <h6 class="fw-bold text-info border-bottom pb-2">Informasi Developer</h6>
        <div class="row mt-3">
            <div class="col-md-6">
                <table class="table table-sm table-borderless">
                    <tr>
                        <td width="30%"><strong>Nama</strong></td>
                        <td>: Mohammad Farhan Syaikowi</td>
                    </tr>
                    <tr>
                        <td><strong>NIM</strong></td>
                        <td>: 2331740021</td>
                    </tr>
                    <tr>
                        <td><strong>Kelas</strong></td>
                        <td>: 3A</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-sm table-borderless">
                    <tr>
                        <td width="30%"><strong>Kampus</strong></td>
                        <td>: Polinema PSDKU Lumajang</td>
                    </tr>
                    <tr>
                        <td><strong>No. Telepon</strong></td>
                        <td>: 085732942241</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>: fsyaikowi.gmail.com</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection