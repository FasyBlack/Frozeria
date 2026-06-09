@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-bg-dark d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Barang</h5>
        <div>
            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit Barang</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                @if($barang->foto_barang)
                    <img src="{{ asset('uploads/barang/' . $barang->foto_barang) }}" class="img-fluid rounded" alt="{{ $barang->nama_barang }}">
                @else
                    <div class="bg-light d-flex justify-content-center align-items-center rounded" style="height: 250px;">
                        <span class="text-muted">Tidak ada foto</span>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h3>{{ $barang->nama_barang }}</h3>
                <span class="badge bg-primary mb-3">{{ $barang->kategori ? $barang->kategori->nama_kategori : 'Tanpa Kategori' }}</span>
                
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Stok Saat Ini</th>
                        <td>{{ $barang->jumlah_stok }} {{ $barang->satuan }}</td>
                    </tr>
                    <tr>
                        <th>Stok Minimum</th>
                        <td>{{ $barang->stok_minimum }} {{ $barang->satuan }}</td>
                    </tr>
                    <tr>
                        <th>Harga Jual</th>
                        <td>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Harga Beli</th>
                        <td>Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Berat / Ukuran</th>
                        <td>{{ $barang->berat_ukuran ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi Simpan</th>
                        <td>{{ $barang->lokasi_simpan ?? '-' }}</td>
                    </tr>
                </table>
                
                <h5>Deskripsi:</h5>
                <p>{{ $barang->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection