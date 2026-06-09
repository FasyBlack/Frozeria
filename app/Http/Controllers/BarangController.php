<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::all();

        $query = Barang::with('kategori');

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $query->where('kategori_id', $request->kategori_id);
        }

        $barangs = $query->paginate(10);

        $stokMenipis = Barang::where('jumlah_stok', '<', 20)->where('jumlah_stok', '>', 0)->count();
        $stokHabis = Barang::where('jumlah_stok', 0)->count();
        $totalBarang = Barang::count();
        $totalkategoris = Kategori::count();

        return view('dashboard', compact('barangs', 'kategoris', 'stokMenipis', 'stokHabis', 'totalBarang', 'totalkategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan' => 'required|string|max:50',
            'jumlah_stok' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'harga_beli' => 'required|integer|min:0',
            'berat_ukuran' => 'nullable|string|max:255',
            'lokasi_simpan' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/barang'), $namaFile);
            $data['foto_barang'] = $namaFile;
        }

        Barang::create($data);

        return redirect()->route('dashboard')->with('success', 'Data barang berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        return view('barang.show', compact('barang'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'satuan' => 'required|string|max:50',
            'jumlah_stok' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'harga_beli' => 'required|integer|min:0',
            'berat_ukuran' => 'nullable|string|max:255',
            'lokasi_simpan' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_barang')) {
            if ($barang->foto_barang && file_exists(public_path('uploads/barang/' . $barang->foto_barang))) {
                unlink(public_path('uploads/barang/' . $barang->foto_barang));
            }

            $file = $request->file('foto_barang');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/barang'), $namaFile);
            $data['foto_barang'] = $namaFile;
        }

        $barang->update($data);


        return redirect()->route('dashboard')->with('success', 'Data barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        if ($barang->foto_barang && file_exists(public_path('uploads/barang/' . $barang->foto_barang))) {
            unlink(public_path('uploads/barang/' . $barang->foto_barang));
        }

        $barang->delete();

        return redirect()->route('dashboard');
    }
}
