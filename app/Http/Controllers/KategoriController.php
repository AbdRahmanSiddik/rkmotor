<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\KategoriRequest as Request;
use App\Models\Barang;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('barang')->get();
        return view('admin.kategori.kategori-view', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $token = Str::random(8);
        $nama_kategori = $request->nama_kategori;

        Kategori::create([
            'kode_kategori' => $token,
            'nama_kategori' => $nama_kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request, Kategori $kategori)
    {
        $token = Str::random(8);
        $nama_kategori = $request->nama_kategori;

        $kategori->update([
            'kode_kategori' => $token,
            'nama_kategori' => $nama_kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        $raw_data = Barang::where('kategori_id', $kategori->id)->get();

        if (count($raw_data) > 0) {
            return redirect()->route('kategori.index')->with('error', 'Kategori gagal dihapus, karena masih memiliki barang');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
