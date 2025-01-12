@php
  $title = "Admin | Detail SparePart $barang->nama_barang";
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
              <li class="breadcrumb-item">SpareParts
              </li><!--end nav-item-->
              <li class="breadcrumb-item"> Detail SpareParts
              </li><!--end nav-item-->
              <li class="breadcrumb-item active"> {{ $barang->nama_barang }}
              </li><!--end nav-item-->
            </ol>
          </div>
          <h4 class="page-title">Detail {{ $barang->nama_barang }}</h4>
        </div><!--end page-title-box-->
      </div><!--end col-->
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">{{ $barang->kategori->nama_kategori }}</h4>
            <div class="btn-group">
                <a href="{{ route('barang.index') }}" class="btn btn-warning btn-lg">Kembali</a>
              <button type="button" class="btn btn-primary btn-lg">
                Stok <span class="badge bg-light text-dark">{{ $barang->stok }}</span>
              </button>
            </div>
          </div><!--end card-header-->
          <div class="card-body">
            <div class="media">
              <img src="{{ asset('images/barang/'.$barang->gambar) }}" width="400px" alt="" class="img-thumbnail">
              <div class="media-body align-self-center ms-3 text-truncate">
                <h3 class="my-0 fw-bold">{{ $barang->nama_barang }}</h3>
                <h5 class="my-0 fw-bold">kategori: {{ $barang->kategori->nama_kategori }}</h5>
                <p class="text-muted mb-2 font-13">Harga jual: @rupiah($barang->harga_jual), Harga Beli: @rupiah($barang->harga_beli)</p>
                <p>{!! $barang->deskripsi !!}</p>
              </div><!--end media-body-->
            </div>
          </div><!--end card-body-->
        </div><!--end card-->
      </div>
    </div>
  </div>
@endsection
