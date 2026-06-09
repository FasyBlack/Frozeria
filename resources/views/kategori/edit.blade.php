@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-bg-dark">
        <h5 class="mb-0">Edit Kategori</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary mb-4">&laquo; Kembali</a>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" >
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Nama kategori *</label>
                <input type="text" name="nama_kategori" class="form-control" required value="{{ $kategori->nama_kategori }}">
            </div>
            
            <div class="mb-4">
                <label class="form-label">Deskripsi (opsional)</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $kategori->deskripsi }}</textarea>
            </div>
            
            <div class="d-flex justify-content-end gap-2 border-top pt-3">
                <a href="{{ route('kategori.index') }}" class="btn btn-light border">Batal</a>
                <button type="submit" class="btn btn-success text-white">Update Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection