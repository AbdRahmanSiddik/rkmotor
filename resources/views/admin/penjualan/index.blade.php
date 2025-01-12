@php
  $title = 'Admin | Penjualan';
@endphp
@extends('layouts.admin')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <div class="float-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">RK Motor</a></li>
              <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
          </div>
          <h4 class="page-title">Form Kasir</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-3">
          <div class="card-header">
            <h4 class="card-title">Form Pencarian</h4>
          </div>
          <div class="card-body">
            <form class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="search" class="form-label">Cari Sparepart</label>
                  <input type="text" class="form-control" id="search" placeholder="Masukkan nama barang" />
                  <small id="helpId" class="form-text text-muted text-danger"></small>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-hover" id="barangTable">
                      <thead>
                        <tr>
                          <th>Nama Barang</th>
                          <th>Kategori</th>
                          <th>Harga Jual</th>
                          <th>Stok</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Data akan dimasukkan melalui AJAX -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <form action="{{ route('pembayaran.store') }}" method="POST" id="checkoutForm">
          @csrf
          <div class="row">
              <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Customer</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="nama_customer" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" name="nama_customer" id="nama_customer"
                              aria-describedby="helpId" placeholder="" />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="alamat_customer" class="form-label">Alamat Customer</label>
                            <input type="text" class="form-control" name="alamat_customer" id="alamat_customer"
                              aria-describedby="helpId" placeholder="" />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak Customer</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" aria-describedby="helpId"
                              placeholder="" />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="text" class="form-control" name="total" id="total"
                              aria-describedby="helpId" placeholder="" value="" readonly />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Form Keranjang</h4>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered rounded" id="keranjangTable">
                        <thead>
                          <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                      <div class="mt-3">
                        <h5>Total Keseluruhan: <span id="totalKeseluruhan">Rp 0</span></h5>
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Checkout</button>
                    </div>
                  </div>
              </div>
          </div>
        </form>

      </div>
    </div>
  </div>
@endsection


@section('scripts')
  <!-- Tambahkan jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>



    $(document).ready(function() {
      $('#search').on('keyup', function() {
        const query = $(this).val().trim();
        const url = `{{ route('barang.api', '') }}/${query}`;

        if (query.length > 0) {
          $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
              const tableBody = $('#barangTable tbody');
              tableBody.empty(); // Kosongkan tabel

              response.forEach(item => {
                tableBody.append(`
                <tr>
                  <td>${item.nama_barang}</td>
                  <td>${item.kategori}</td>
                  <td>${item.harga_jual}</td>
                  <td>${item.stok}</td>
                  <td>
                    <button class="btn btn-success btn-sm add-to-cart"
                      data-id="${item.id_barang}"
                      data-nama="${item.nama_barang}"
                      data-harga="${item.harga_jual}">Tambah</button>
                  </td>
                </tr>
              `);
              });
            },
            error: function() {
              const tableBody = $('#barangTable tbody');
              tableBody.empty();
              tableBody.append(`
              <tr>
                <td colspan="5" class="text-center">Data tidak ditemukan</td>
              </tr>
            `);
            }
          });
        } else {
          // Kosongkan tabel jika input pencarian kosong
          $('#barangTable tbody').empty();
        }
      });

      $(document).on('click', '.add-to-cart', function(event) {
        event.preventDefault();

        const nama = $(this).data('nama');
        const harga = $(this).data('harga');
        const jumlah = 1; // Jumlah awal
        const kode_barang = $(this).data('id');

        // Hitung total awal
        const total = harga * jumlah;


        // Tambahkan barang ke tabel keranjang
        $('#keranjangTable tbody').append(`
    <tr>
      <td>${nama}</td>
      <td>Rp ${harga.toLocaleString()}</td>
      <td>
        <input type="text" name="id_barang[]" value="${kode_barang}" hidden>
        <div class="input-group qty-icons w-50">
          <button class="btn btn-primary btn-sm decrement-qty">-</button>
          <input type="number" class="form-control qty-input" min="1" value="${jumlah}" data-harga="${harga}" style="pointer-events: none;" name="kuantitas[]">
          <button class="btn btn-primary btn-sm increment-qty">+</button>
        </div>
      </td>
      <td class="total-harga">Rp ${total.toLocaleString()}</td>
      <td>
        <button type="button" class="btn btn-danger btn-sm remove-from-cart">Hapus</button>
      </td>
    </tr>


  `);

        updateTotalKeseluruhan();
      });

      // Mengurangi jumlah barang
      $(document).on('click', '.decrement-qty', function() {
        event.preventDefault();
        const input = $(this).siblings('.qty-input');
        const harga = input.data('harga');
        let jumlah = parseInt(input.val());

        if (jumlah > 1) {
          jumlah -= 1;
          input.val(jumlah);

          // Perbarui total di baris ini
          const total = harga * jumlah;
          $(this).closest('tr').find('.total-harga').text(`Rp ${total.toLocaleString()}`);
        }

        updateTotalKeseluruhan();
      });

      // Menambah jumlah barang
      $(document).on('click', '.increment-qty', function() {
        event.preventDefault();
        const input = $(this).siblings('.qty-input');
        const harga = input.data('harga');
        let jumlah = parseInt(input.val());

        jumlah += 1;
        input.val(jumlah);

        // Perbarui total di baris ini
        const total = harga * jumlah;
        $(this).closest('tr').find('.total-harga').text(`Rp ${total.toLocaleString()}`);

        updateTotalKeseluruhan();
      });

      // Menghapus barang dari keranjang
      $(document).on('click', '.remove-from-cart', function() {
        event.preventDefault();
        $(this).closest('tr').remove();
        updateTotalKeseluruhan();
      });

      // Fungsi untuk menghitung total keseluruhan
      function updateTotalKeseluruhan() {
        let totalKeseluruhan = 0;

        $('#keranjangTable tbody tr').each(function() {
          const total = $(this)
            .find('.total-harga')
            .text()
            .replace('Rp ', '') // Hilangkan "Rp "
            .replace(/\,/g, ''); // Hilangkan semua titik ribuan
          totalKeseluruhan += parseInt(total) || 0; // Pastikan total adalah angka, atau 0 jika kosong
        });

        // Tampilkan total keseluruhan dengan format angka ribuan
        $('#totalKeseluruhan').text(`Rp ${totalKeseluruhan.toLocaleString()}`);
        $('#total').val(totalKeseluruhan);
      }

      $('#checkoutForm').on('submit', function(event) {

        if (event.originalEvent.submitter && event.originalEvent.submitter.type === 'submit') {
        // Biarkan form terkirim jika tombol submit yang ditekan
        return true;
      }
      // Jika tombol lain atau event lain yang menyebabkan submit, hentikan pengiriman form
      event.preventDefault();
        // event.preventDefault();

        // const customerData = {
        //   nama_customer: $('#nama_customer').val(),
        //   alamat_customer: $('#alamat_customer').val(),
        //   kontak: $('#kontak').val(),
        //   total_pembayaran: $('#totalKeseluruhan').text().replace('Rp ', '').replace(/\,/g, '')
        // };

        // const cartItems = [];
        // $('#keranjangTable tbody tr').each(function() {
        //   const item = {
        //     nama_barang: $(this).find('td').eq(0).text(),
        //     harga: $(this).find('td').eq(1).text().replace('Rp ', '').replace(/\,/g, ''),
        //     jumlah: $(this).find('.qty-input').val()
        //   };
        //   cartItems.push(item);
        // });

        // $.ajax({
        //   url: $(this).attr('action'),
        //   method: 'POST',
        //   data: {
        //     _token: '{{ csrf_token() }}',
        //     customer: customerData,
        //     items: cartItems
        //   },
        //   success: function(response) {
        //     alert('Pembayaran berhasil!');
        //     location.reload();
        //   },
        //   error: function() {
        //     alert('Terjadi kesalahan, silakan coba lagi.');
        //   }
        // });
      });

    });
  </script>
@endsection
