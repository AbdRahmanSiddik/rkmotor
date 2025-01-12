@php
  $title = 'Admin | Kategori';
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
              <li class="breadcrumb-item active">Kategori
              </li><!--end nav-item-->
            </ol>
          </div>
          <h4 class="page-title">Data Kategori</h4>
        </div><!--end page-title-box-->
      </div><!--end col-->
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Kategori Detail </h4>
            <div>
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary"
                class="btn btn-secondary">+ Tambah Kategori</button>

              <div class="modal fade" id="exampleModalPrimary" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form action="{{ route('kategori.store') }}" method="POST" class="needs-validation" novalidate>
                      @csrf
                      <div class="modal-header bg-primary">
                        <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Form Tambah kategori</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div><!--end modal-header-->
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="validationCustom01" class="form-label">Nama Kategori</label>
                          <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            id="validationCustom01" name="nama_kategori" required>
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          <div class="invalid-feedback">
                            @error('nama_kategori')
                              {{ $message }}
                              Nama kategori harus diisi
                            @enderror
                          </div>
                        </div>
                      </div><!--end modal-body-->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-de-primary btn-sm">Save changes</button>
                      </div><!--end modal-footer-->
                    </form>
                  </div><!--end modal-content-->
                </div><!--end modal-dialog-->
              </div><!--end modal-->
            </div>
          </div><!--end card-header-->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="datatable_1">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Kode Kategori</th>
                    <th class="text-center">Jumlah Kategori</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kategoris as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_kategori }}</td>
                      <td>{{ $item->kode_kategori }}</td>
                      <td class="text-center">{{ $item->barang_count }}</td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edittarget{{ $item->kode_kategori }}">Edit</button>
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $item->kode_kategori }}">Hapus</button>
                        </div>
                      </td>
                    </tr>

                    <div class="modal fade" id="edittarget{{ $item->kode_kategori }}" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="{{ route('kategori.update', $item->kode_kategori) }}" method="POST"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('PATCH')
                            <div class="modal-header bg-primary">
                              <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Form Edit kategori
                                {{ $item->nama_kategori }}</h6>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div><!--end modal-header-->
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                  id="validationCustom01" name="nama_kategori" required
                                  value="{{ $item->nama_kategori }}">
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  @error('nama_kategori')
                                    {{ $message }}
                                    Nama kategori harus diisi
                                  @enderror
                                </div>
                              </div>
                            </div><!--end modal-body-->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-de-secondary btn-sm"
                                data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-de-primary btn-sm">Save changes</button>
                            </div><!--end modal-footer-->
                          </form>
                        </div><!--end modal-content-->
                      </div><!--end modal-dialog-->
                    </div><!--end modal-->

                    <div class="modal fade" id="deleteModal{{ $item->kode_kategori }}" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalDanger1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-danger">
                            <h6 class="modal-title m-0 text-white" id="exampleModalDanger1">Form Hapus kategori {{ $item->nama_kategori }}</h6>
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
                            <form action="{{ route('kategori.destroy', $item->kode_kategori) }}" method="POST">
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
  </div>
@endsection
