<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\DetailPembayaran;
use App\Models\Barang;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('admin.penjualan.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $token = Str::random(16);
        $nama_customer = $request->nama_customer;
        $alamat_customer = $request->alamat_customer;
        $kontak = $request->kontak;
        $total = $request->total;

        $data = [
            'kode_pembayaran' => $token,
            'nama_customer' => $nama_customer,
            'alamat_customer' => $alamat_customer,
            'kontak' => $kontak,
            'tota_pembayaran' => $total,
            'created_at' => now()
        ];

        $customer = Pembayaran::insertGetId($data);

        // Ambil data `id_barang` dan `kuantitas` dari request
        $id_barang = $request->input('id_barang', []);
        $kuantitas = $request->input('kuantitas', []);

        // Ambil ID pembayaran yang baru saja dibuat
        $pembayaran_id = $customer;
        // dd($pembayaran_id);

        // Siapkan data untuk sinkronisasi dengan menyertakan pembayaran_id
        $syncData = [];
        foreach ($id_barang as $key => $barang_id) {
            $syncData[$barang_id] = [
                'kuantitas' => $kuantitas[$key],
                'pembayaran_id' => $pembayaran_id,  // Menambahkan pembayaran_id
            ];

            // Kurangi stok barang berdasarkan kuantitas yang dipesan
            $barang = Barang::where('id', $barang_id)->first();
            if ($barang) {
                $barang->update(['stok' => $barang->stok - $kuantitas[$key]]);
            }
        }

        // Sinkronisasi data dengan tabel pivot, sekarang menyertakan pembayaran_id
        $pembayaran = new Pembayaran();
        $pembayaran->barang()->sync($syncData);

        // Redirect ke dashboard dengan pesan sukses
        return redirect()->route('pembayaran.show', $token)->with('success', 'Data berhasil disimpan.');

    }

    public function show(Pembayaran $pembayaran)
    {
        return view('admin.penjualan.penjualan-show', compact('pembayaran'));
    }

    public function penjualan()
    {
        $penjualans = Pembayaran::withCount('barang')->get();

        return view('admin.pembayaran.pembayaran-create', compact('penjualans'));
    }

    public function destroy(Pembayaran $pembayaran)
    {
        DetailPembayaran::where('pembayaran_id', $pembayaran->id)->delete();
        $pembayaran->delete();

        return redirect()->route('penjualan.index')->with('success', "Data Berhasil dihapus");
    }
}
