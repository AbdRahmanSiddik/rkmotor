@php
  $title = 'Admin | Data Barang';
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
              <li class="breadcrumb-item active">SpareParts
              </li><!--end nav-item-->
            </ol>
          </div>
          <h4 class="page-title">Data SparePart</h4>
        </div><!--end page-title-box-->
      </div><!--end col-->
    </div>
  </div>
  <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Sparepart Detail </h4>
            <div>
              <a href="{{ route('barang.create') }}" class="btn btn-secondary">+ Tambah Sparepart</a>
            </div>
          </div><!--end card-header-->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="datatable_1">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Kategori</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($barangs as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_barang }}</td>
                      <td>{{ $item->kode_barang }}</td>
                      <td>{{ $item->kategori->nama_kategori }}</td>
                      <td class="text-center">{{ $item->stok }}</td>
                      <td class="text-center">
                        <small>Jual: @rupiah($item->harga_jual)</small><br>
                        <small>Beli: @rupiah($item->harga_beli)</small>
                      </td>
                      <td class="text-center">
                        <div class="btn-group">
                          <a class="btn btn-primary" href="{{ route('barang.edit', $item->kode_barang) }}">Edit</a>
                          <a href="{{ route('barang.show', $item->kode_barang) }}" class="btn btn-warning">Detail</a>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $item->kode_barang }}">Hapus</button>
                        </div>
                      </td>
                    </tr>

                    <div class="modal fade" id="deleteModal{{ $item->kode_barang }}" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalDanger1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-danger">
                            <h6 class="modal-title m-0 text-white" id="exampleModalDanger1">Form Hapus kategori {{ $item->nama_barang }}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div><!--end modal-header-->
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-3 text-center align-self-center">
                                <img src="assets/images/small/btc.png" alt="" class="img-fluid">
                              </div><!--end col-->
                              <div class="col-lg-9">
                                <h5>Yakin ingin menghapus data ini</h5>
                                <span class="badge bg-soft-secondary">Dibuat</span>
                                <small class="text-muted ml-2">{{ $item->created_at->format('d M Y') }}</small>
                                <ul class="mt-3 mb-0">
                                  <li>Tidak dapat dihapus jika ada data terkait.</li>
                                  <li>It is a long established reader.</li>
                                  <li>Contrary to popular belief, Lorem simply.</li>
                                </ul>
                              </div><!--end col-->
                            </div><!--end row-->
                          </div><!--end modal-body-->
                          <div class="modal-footer">
                            <form action="{{ route('barang.destroy', $item->kode_barang) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-de-secondary btn-sm"
                                  data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-de-danger btn-sm">Save changes</button>
                            </form>
                          </div><!--end modal-footer-->
                        </div><!--end modal-content-->
                      </div><!--end modal-dialog-->
                    </div><!--end modal-->
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
  </div>
@endsection
