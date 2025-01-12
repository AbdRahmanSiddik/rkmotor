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

    public function create()
    {
        return view('admin.pembayaran.pembayaran-create');
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
        ];

        $customer = Pembayaran::create($data);

        $id_barang = $request->input('id_barang', []);
        $kuantitas = $request->input('kuantitas', []);

        // Siapkan data untuk sinkronisasi
        $syncData = [];
        foreach ($id_barang as $key => $barang_id) {
            $syncData[$barang_id] = ['kuantitas' => $kuantitas[$key]];
        }

        // Sinkronisasi data dengan tabel pivot
        $customer->barang()->sync($syncData);

        // Redirect ke dashboard
        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
