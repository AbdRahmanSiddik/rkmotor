@php
  $title = 'Admin | Dashboard';
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
              <li class="breadcrumb-item"><a href="#">Metrica</a>
              </li><!--end nav-item-->
              <li class="breadcrumb-item"><a href="#">Dashboard</a>
              </li><!--end nav-item-->
              <li class="breadcrumb-item active">Welcome</li>
            </ol>
          </div>
          <h4 class="page-title">Welcome</h4>
        </div><!--end page-title-box-->
      </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <!-- end page title end breadcrumb -->
    <div class="row" style="height: 100vh;">
        <div class="col-12" >
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="card" style="width: 100%; max-width: 400px; border-radius: 15px;">
                    <div class="card-body text-center">
                        <h1 class="card-title mb-4">Selamat Datang, {{ auth()->user()->name }}!</h1>
                        <p class="card-text">Terima kasih telah bergabung dengan kami. Kami senang memiliki Anda di sini.</p>
                        <div class="mt-4">
                            <button class="btn btn-primary">Mulai Sekarang</button>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p class="text-muted">Nikmati pengalaman Anda!</p>
                    </div>
                </div>
            </div>
            <div class="ornament-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;">
                <div class="bg-primary" style="height: 100%; width: 100%; opacity: 0.1;"></div>
                <div class="ornament" style="position: absolute; top: 20%; left: 50%; transform: translateX(-50%);">
                    <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="45" stroke="white" stroke-width="4" fill="transparent" />
                    </svg>
                </div>
            </div>
        </div>

    </div><!--end row-->

  </div><!-- container -->
@endsection
