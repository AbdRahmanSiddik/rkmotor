<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Http\Requests\BarangRequest as Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    public function index()
    {
        $data['barangs'] = Barang::with('kategori')->get();
        return view('admin.barang.barang-view', $data);
    }

    public function create()
    {
        $data['kategoris'] = Kategori::get();
        return view('admin.barang.barang-create', $data);
    }

    public function store(Request $request)
    {
        $token = Str::random(8);
        $nama_barang = $request->nama_barang;
        $stok = $request->stok;
        $harga_beli = $request->harga_beli;
        $harga_jual = $harga_beli + ($harga_beli * ($request->harga_jual/100));
        $kategori_id = $request->kategori_id;
        $deskripsi = $request->deskripsi;

        $file = $request->file('gambar');
        $file_name = $token.'.'.$file->getClientOriginalExtension();

        $data = [
            'kode_barang' => $token,
            'nama_barang' => $nama_barang,
            'gambar' => $file_name,
            'stok' => $stok,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'kategori_id' => $kategori_id,
            'deskripsi' => $deskripsi,
        ];

        Barang::create($data);
        $file->move('images/barang/', $file_name);

        return redirect()->route('barang.index')->with('success', 'Data berhasil ditambah');
    }

    public function show(Barang $barang)
    {
        return view('admin.barang.barang-show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::get();
        return view('admin.barang.barang-edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $token = Str::random(8);
        $nama_barang = $request->nama_barang;
        $stok = $request->stok;
        $harga_beli = $request->harga_beli;
        $harga_jual = $harga_beli + ($harga_beli * ($request->harga_jual/100));
        $kategori_id = $request->kategori_id;
        $deskripsi = $request->deskripsi;

        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $file_name = $token.'.'.$file->getClientOriginalExtension();
            $file->move('images/barang/', $file_name);
            File::delete('images/barang/'.$barang->gambar);
        }else{
            $file_name = $barang->gambar;
        }

        $data = [
            'kode_barang' => $token,
            'nama_barang' => $nama_barang,
            'gambar' => $file_name,
            'stok' => $stok,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'kategori_id' => $kategori_id,
            'deskripsi' => $deskripsi,
        ];

        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Barang $barang)
    {
        if($barang->stok > 0){
            return redirect()->route('barang.index')->with('error', 'Barang masih memiliki stok, gagal menghapus');
        }
        File::delete('imags/barang/'.$barang->gambar);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }

    public function barangAPI($key)
    {
        // Menggunakan fungsi lower untuk memastikan pencarian case-insensitive
        $key = strtolower($key);

        $items = Barang::whereRaw('LOWER(nama_barang) LIKE ?', ['%' . $key . '%'])->with('kategori')->get();

        if($items->isNotEmpty()){
            $data = $items->map(function($item) {
                return [
                    'nama_barang' => $item->nama_barang,
                    'kategori' => $item->kategori->nama_kategori,
                    'stok' => $item->stok,
                    'harga_beli' => $item->harga_beli,
                    'harga_jual' => $item->harga_jual,
                    'gambar' => $item->harga_jual,
                    'deskripsi' => $item->deskripsi,
                    'created_at' => $item->created_at,
                    'kode_barang' => $item->kode_barang,
                    'id_barang' => $item->id
                ];
            });

            return response()->json($data);
        }else{
            return response()->json('Data not found', 404);
        }
    }
}
