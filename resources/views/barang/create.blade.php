@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-bg-dark">
        <h5 class="mb-0">Tambah Barang Baru</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary mb-4">&laquo; Kembali</a>

        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4 text-center border p-4 bg-light rounded">
                <label class="form-label fw-bold">Foto barang</label><br>
                
                <img id="previewFoto" src="#" alt="Preview Foto" class="img-fluid rounded mb-3 shadow-sm" style="max-height: 200px; display: none; margin: 0 auto;">
                
                <input type="file" name="foto_barang" id="inputFoto" class="form-control w-50 mx-auto" accept="image/*">
                
                <small class="text-muted d-block mt-2">Format JPG, PNG. Maksimal 2MB</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama barang </label>
                <input type="text" name="nama_barang" class="form-control" required placeholder="Contoh: Ayam nugget crispy">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori </label>
                    <select name="kategori_id" class="form-select" required>
                        <option value="">Pilih kategori...</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Satuan </label>
                    <input type="text" name="satuan" class="form-control" required placeholder="Contoh: pcs, pack, kg">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jumlah stok </label>
                    <input type="number" name="jumlah_stok" class="form-control" required value="0">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok minimum</label>
                    <input type="number" name="stok_minimum" class="form-control" value="0">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga jual (Rp) </label>
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga beli (Rp) </label>
                    <input type="number" name="harga_beli" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Berat / ukuran</label>
                    <input type="text" name="berat_ukuran" class="form-control" placeholder="Contoh: 500 gram">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi simpan</label>
                    <input type="text" name="lokasi_simpan" class="form-control" placeholder="Contoh: Rak A-3">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>
            
            <div class="d-flex justify-content-end gap-2 border-top pt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-light border">Batal</a>
                <button type="submit" class="btn btn-success text-white">Simpan Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection


@push('scripts')
<script>
    const inputFoto = document.getElementById('inputFoto');
    const previewFoto = document.getElementById('previewFoto');

    inputFoto.addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const fileURL = URL.createObjectURL(file);
            
            previewFoto.src = fileURL;
            
            previewFoto.style.display = 'block';
        } else {
            previewFoto.src = '#';
            previewFoto.style.display = 'none';
        }
    });
</script>
@endpush