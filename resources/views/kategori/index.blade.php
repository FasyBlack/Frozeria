@extends('layouts.app')

@section('content')
<div class="card custom-table-card">
    <div class="card-header d-flex justify-content-between align-items-center text-bg-dark border-0 rounded-top" style="border-radius: 15px 15px 0 0;">
        <h5 class="mb-0">Daftar Kategori</h5>
        <a href="{{ route('kategori.create') }}" class="btn btn-outline-light btn-sm">Tambah Kategori</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mt-2">
                <thead class="table-light">
                    <tr>
                        <th>Nama kategori</th>
                        <th>Jumlah barang</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $kategori)
                    <tr>
                        <td class="fw-medium">{{ $kategori->nama_kategori }}</td>
                        <td>{{ $kategori->barang_count }} barang</td>
                        <td>{{ $kategori->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                            
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusKategoriModal{{ $kategori->id }}">
                                Hapus
                            </button>

                            <div class="modal fade" id="hapusKategoriModal{{ $kategori->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title"> Hapus kategori?</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start mt-2 text-wrap text-dark">
                                            <p>Data kategori <strong>{{ $kategori->nama_kategori }}</strong> akan dihapus secara permanen. Barang di dalam kategori ini tidak akan ikut terhapus.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Kategori belum ada. Silakan tambah kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection