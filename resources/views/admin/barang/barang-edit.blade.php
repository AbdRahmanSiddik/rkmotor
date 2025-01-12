@php
  $title = 'Admin | Form Tambah Spareparts';
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
              <li class="breadcrumb-item active"> Tambah SpareParts
              </li><!--end nav-item-->
            </ol>
          </div>
          <h4 class="page-title">Tambah Data SparePart</h4>
        </div><!--end page-title-box-->
      </div><!--end col-->
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <form action="{{ route('barang.update', $barang->kode_barang) }}" method="POST" novalidate enctype="multipart/form-data"
            class="needs-validation">
            @csrf
            @method('PATCH')
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="card-title">Form Tambah Data Sparepart</h4>
              <div class="btn-group">
                <a href="{{ route('barang.index') }}" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-secondary">Submit</button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Sparepart</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                          name="nama_barang" id="nama_barang" aria-describedby="helpId"
                          placeholder="Masukkan nama sparepart..." required  value="{{ $barang->nama_barang }}"/>
                        <small class="invalid-feedback">
                          @error('nama_barang')
                            {{ $messade }}
                          @enderror
                        </small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="sto" class="form-label">Stok Sparepart</label>
                        <input type="number" inputmode="numeric" class="form-control @error('stok') is-invalid @enderror"
                          name="stok" id="stok" aria-describedby="helpId" placeholder="Masukkan Stok" required value="{{ $barang->stok }}"/>
                        <small class="invalid-feedback">
                          @error('stok')
                            {{ $messade }}
                          @enderror
                        </small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli Sparepart</label>
                        <input type="number" inputmode="numeric" value="{{ $barang->harga_beli }}"
                          class="form-control @error('harga_beli') is-invalid @enderror" name="harga_beli" id="harga_beli"
                          aria-describedby="helpId" placeholder="Masukkan harga beli" required />
                        <small class="invalid-feedback">
                          @error('harga_beli')
                            {{ $messade }}
                          @enderror
                        </small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="harga_jual" class="form-label">Harga Jual Sparepart</label>
                        <input type="number" inputmode="numeric" value="{{ ((($barang->harga_jual - $barang->harga_beli)/$barang->harga_beli)*100) }}"
                          class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" id="harga_jual"
                          aria-describedby="helpId" placeholder="Berapa % dari harga beli" required />
                        <small class="invalid-feedback">
                          @error('harga_jual')
                            {{ $messade }}
                          @enderror
                        </small>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label for="kategori_id" class="form-label required">Kategori</label>
                        <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id" required>
                          <option selected disabled value="">Pilih kategori</option>
                          @foreach ($kategoris as $item)
                            <option value="{{ $item->id }}" {{ $barang->kategori_id == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                          @endforeach
                        </select>
                        <small>
                            @error('kategori_id') {{ $message }} @enderror
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label" for="fileInput">Upload Gambar disini</label>
                    <!-- Tempat Preview -->
                    <div style="background-image: url({{ asset('images/barang/'.$barang->gambar) }})" class="image-preview @error('gambar') is-invalid @enderror" id="imagePreview" onclick="document.getElementById('fileInput').click();">
                    </div>
                    <!-- Input File (Hidden) -->
                    <input type="file" id="fileInput" class="d-none" accept="image/jpeg, image/jpg, image/png"
                      onchange="previewImage(event)" name="gambar">
                      <small>
                        @error('gambar') {{ $message }} @enderror
                      </small>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label required">Deskripsi Sparepart</label>
                        <textarea
                          class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                          aria-describedby="helpId" placeholder="Masukkan deskripsi"rows="10" required >{!! $barang->deskripsi !!}</textarea>
                        <small class="invalid-feedback">
                          @error('deskripsi')
                            {{ $messade }}
                          @enderror
                        </small>
                      </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fungsi untuk Preview Gambar
    function previewImage(event) {
      const file = event.target.files[0];
      const previewContainer = document.getElementById('imagePreview');

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          previewContainer.style.backgroundImage = `url('${e.target.result}')`;
          previewContainer.textContent = ''; // Hilangkan teks "Masukkan Gambar"
        };
        reader.readAsDataURL(file);
      }
    }
  </script>
@endsection
