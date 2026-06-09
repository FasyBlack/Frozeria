@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-bg-dark">
        <h5 class="mb-0">Edit Barang: {{ $barang->nama_barang }}</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary mb-4">&laquo; Kembali</a>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT') <div class="mb-4 text-center border p-4 bg-light rounded">
                @if($barang->foto_barang)
                    <img src="{{ asset('uploads/barang/' . $barang->foto_barang) }}" width="150" class="mb-2 rounded">
                @endif
                <label class="form-label fw-bold d-block">Ganti Foto (opsional)</label>
                <input type="file" name="foto_barang" class="form-control w-50 mx-auto" accept="image/*">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama barang *</label>
                <input type="text" name="nama_barang" class="form-control" required value="{{ $barang->nama_barang }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori *</label>
                    <select name="kategori_id" class="form-select" required>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Satuan *</label>
                    <input type="text" name="satuan" class="form-control" required value="{{ $barang->satuan }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jumlah stok *</label>
                    <input type="number" name="jumlah_stok" class="form-control" required value="{{ $barang->jumlah_stok }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok minimum</label>
                    <input type="number" name="stok_minimum" class="form-control" value="{{ $barang->stok_minimum }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga jual (Rp) *</label>
                    <input type="number" name="harga_jual" class="form-control" required value="{{ $barang->harga_jual }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga beli (Rp) *</label>
                    <input type="number" name="harga_beli" class="form-control" required value="{{ $barang->harga_beli }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Berat / ukuran</label>
                    <input type="text" name="berat_ukuran" class="form-control" value="{{ $barang->berat_ukuran }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi simpan</label>
                    <input type="text" name="lokasi_simpan" class="form-control" value="{{ $barang->lokasi_simpan }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $barang->deskripsi }}</textarea>
            </div>
            
            <div class="d-flex justify-content-end gap-2 border-top pt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-light border">Batal</a>
                <button type="submit" class="btn btn-success text-white">Update Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection