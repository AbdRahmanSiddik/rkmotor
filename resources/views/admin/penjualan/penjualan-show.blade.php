@php
  $title = 'Admin | Faktur';
@endphp
@extends('layouts.admin')

@section('content')
  <div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <div class="float-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">RK Motor</a>
              </li><!--end nav-item-->
              <li class="breadcrumb-item active">Faktur
              </li><!--end nav-item-->
            </ol>
          </div>
          <h4 class="page-title">Faktur</h4>
        </div><!--end page-title-box-->
      </div><!--end col-->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Faktur</h4>
                    <div class="btn-group">
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-warning">Kembali</a>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Ke Data master</a>
                        <button class="btn btn-primary" onclick="window.print()">Cetak</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="invoice">
                        <h5>Customer Information</h5>
                        <p><strong>Nama:</strong> {{ $pembayaran->nama_customer }}</p>
                        <p><strong>Alamat:</strong> {{ $pembayaran->alamat_customer }}</p>
                        <p><strong>Kontak:</strong> {{ $pembayaran->kontak }}</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kuantitas</th>
                                    <th>Harga</th>
                                    <th>Jumlah Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran->barang as $item)
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->pivot->kuantitas }}</td>
                                    <td>@rupiah($item->harga_jual)</td>
                                    <td>@rupiah($item->pivot->kuantitas * $item->harga_jual)</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h5 class="text-end">Total: @rupiah($pembayaran->tota_pembayaran)</h5>
                        <p class="text-center">Thank you for your purchase!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
