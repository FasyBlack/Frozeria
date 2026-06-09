@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        
        <div class="col-md-3">
            <div class="card stat-card card-semua mb-3 p-2">
                <div class="card-body">
                    <h5 class="card-title">Semua Barang</h5>
                    <h2>{{ $totalBarang }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card card-menipis mb-3 p-2">
                <div class="card-body">
                    <h5 class="card-title">Stok Menipis</h5>
                    <h2>{{ $stokMenipis }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card card-kategori mb-3 p-2">
                <div class="card-body">
                    <h5 class="card-title">Total Kategori</h5>
                    <h2>{{ $totalkategoris }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card card-habis mb-3 p-2">
                <div class="card-body">
                    <h5 class="card-title">Stok Habis</h5>
                    <h2>{{ $stokHabis }}</h2>
                </div>
            </div>
        </div>
        

    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card custom-table-card">
                <div class="card-body">
                    <form action="{{ route('dashboard') }}" method="GET" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control rounded-pill px-3"
                                placeholder=" Cari nama barang..." value="{{ request('search') }}">
                        </div>

                        <div class="col-md-3">
                            <select name="kategori_id" class="form-select rounded-pill">
                                <option value="">Semua kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary rounded-pill w-100">Cari</button>
                        </div>

                        <div class="col-md-3 text-end">
                            <a href="{{ route('barang.create') }}" class="btn btn-primary-custom rounded-pill px-4">Tambah
                                Barang</a>
                        </div>

                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Nama barang</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Harga jual</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($barangs as $barang)
                                    <tr>
                                        <td class="fw-medium">{{ $barang->nama_barang }}</td>
                                        <td><span
                                                class="badge bg-light text-dark border">{{ $barang->kategori ? $barang->kategori->nama_kategori : 'Tidak Ada' }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $barang->jumlah_stok == 0 ? 'bg-danger' : ($barang->jumlah_stok < 20 ? 'bg-warning text-dark' : 'bg-success') }}">
                                                {{ $barang->jumlah_stok }}
                                            </span>
                                        </td>

                                        <td class="text-muted">{{ $barang->satuan }}</td>
                                        <td>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('barang.show', $barang->id) }}"
                                                class="btn btn-sm btn-info text-white">Detail</a>

                                            <a href="{{ route('barang.edit', $barang->id) }}"
                                                class="btn btn-sm btn-warning text-white">Edit</a>

                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusModal{{ $barang->id }}">Hapus</button>

                                            <div class="modal fade" id="hapusModal{{ $barang->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"> Hapus barang?</h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body text-start mt-2 text-wrap">
                                                            <p>Data <strong>{{ $barang->nama_barang }}</strong> akan
                                                                dihapus secara permanen dari sistem.</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light border"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{ route('barang.destroy', $barang->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Ya,
                                                                    Hapus</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">Data barang tidak ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 border-top pt-3 text-muted"
                        style="font-size: 0.9rem;">
                        <div>Menampilkan {{ $barangs->firstItem() ?? 0 }} - {{ $barangs->lastItem() ?? 0 }} dari
                            {{ $barangs->total() }} barang</div>
                        <div class="custom-pagination">
                            {{ $barangs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
