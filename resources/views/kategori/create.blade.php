@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-bg-dark">
        <h5 class="mb-0">Tambah Kategori</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary mb-4">&laquo; Kembali</a>

        <form action="{{ route('kategori.store') }}" method="POST" >
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama kategori </label>
                <input type="text" name="nama_kategori" class="form-control" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Deskripsi (opsional)</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('kategori.index') }}" class="btn btn-light border">Batal</a>
                <button type="submit" class="btn btn-success text-white">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection