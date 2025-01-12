<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>{{ $title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

  <link href="{{ asset('') }}assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />

  <!-- Sweet Alert -->
  <link href="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('') }}assets/libs/animate.css/animate.min.css" rel="stylesheet" type="text/css">

  <!-- App css -->
  <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" />

  <style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type="number"] {
      -moz-appearance: textfield;
    }

    .image-preview {
      width: 100%;
      height: 200px;
      border: 2px dashed #ced4da;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #6c757d;
      cursor: pointer;
      background-size: cover;
      background-position: center;
    }
  </style>

</head>

<body id="body" class="bg-primary">
  <!-- leftbar-tab-menu -->
  <div class="leftbar-tab-menu">
    <div class="main-icon-menu">
      <a href="/dashboard" class="logo logo-metrica d-block text-center">
        <span>
          <img src="{{ asset('') }}assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
        </span>
      </a>
      <div class="main-icon-menu-body">
        <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
          <ul class="nav nav-tabs" role="tablist" id="tab-menu">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"
              data-bs-trigger="hover">
              <a href="#MetricaDashboard" id="dashboard-tab" class="nav-link">
                <i class="ti ti-smart-home menu-icon"></i>
              </a><!--end nav-link-->
            </li><!--end nav-item-->
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Master"
              data-bs-trigger="hover">
              <a href="#MetricaApps" id="apps-tab" class="nav-link">
                <i class="ti ti-apps menu-icon"></i>
              </a><!--end nav-link-->
            </li><!--end nav-item-->

            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Kasir"
              data-bs-trigger="hover">
              <a href="#MetricaUikit" id="uikit-tab" class="nav-link">
                <i class="ti ti-planet menu-icon"></i>
              </a><!--end nav-link-->
            </li><!--end nav-item-->

            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Settings"
              data-bs-trigger="hover">
              <a href="#MetricaAuthentication" id="authentication-tab" class="nav-link">
                <i class="ti ti-shield-lock menu-icon"></i>
              </a><!--end nav-link-->
            </li><!--end nav-item-->
          </ul><!--end nav-->
        </div><!--end /div-->
      </div><!--end main-icon-menu-body-->
      <div class="pro-metrica-end">
        <a href="#" class="profile">
          <img src="{{ asset('') }}assets/images/users/user-vector.png" alt="profile-user"
            class="rounded-circle thumb-sm">
        </a>
      </div><!--end pro-metrica-end-->
    </div>
    <!--end main-icon-menu-->

    <div class="main-menu-inner">
      <!-- LOGO -->
      <div class="topbar-left">
        <a href="index.html" class="logo">
          <span>
            <img src="{{ asset('') }}assets/images/rkmotor.png" alt="logo-large" class="logo-lg logo-dark">
            <img src="{{ asset('') }}assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
          </span>
        </a><!--end logo-->
      </div><!--end topbar-left-->
      <!--end logo-->
      <div class="menu-body navbar-vertical tab-content" data-simplebar>
        <div id="MetricaDashboard" class="main-icon-menu-pane tab-pane" role="tabpanel" aria-labelledby="dasboard-tab">
          <div class="title-box">
            <h6 class="menu-title">Dashboard</h6>
          </div>

          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Welcome</a>
            </li><!--end nav-item-->
          </ul><!--end nav-->
        </div><!-- end Dashboards -->

        <div id="MetricaApps" class="main-icon-menu-pane tab-pane" role="tabpanel" aria-labelledby="apps-tab">
          <div class="title-box">
            <h6 class="menu-title">Data Master</h6>
          </div>

          <div class="collapse navbar-collapse" id="sidebarCollapse">
            <!-- Navigation -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/kategori">Data Kategori</a>
              </li><!--end nav-item-->
              <li class="nav-item">
                <a class="nav-link"
                  href="/barang">Data Spareparts</a>
              </li><!--end nav-item-->
              <li class="nav-item">
                <a class="nav-link"
                  href="/penjualan">Data Penjualan</a>
              </li><!--end nav-item-->

            </ul><!--end navbar-nav--->
          </div><!--end sidebarCollapse-->
        </div><!-- end Crypto -->

        <div id="MetricaUikit" class="main-icon-menu-pane  tab-pane" role="tabpanel" aria-labelledby="uikit-tab">
          <div class="title-box">
            <h6 class="menu-title">Kasir</h6>
          </div>
          <div class="collapse navbar-collapse" id="sidebarCollapse_2">
            <!-- Navigation -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/pembayaran">Form Kasir</a>
              </li><!--end nav-item-->
            </ul><!--end navbar-nav--->
          </div><!--end sidebarCollapse_2-->
        </div><!-- end Others -->

        <div id="MetricaAuthentication" class="main-icon-menu-pane tab-pane" role="tabpanel"
          aria-labelledby="authentication-tab">
          <div class="title-box">
            <h6 class="menu-title">Settings</h6>
          </div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Setting</a>
            </li><!--end nav-item-->
            <li class="nav-item">
              <a class="nav-link" href="/profile">Account</a>
            </li><!--end nav-item-->
          </ul><!--end nav-->
        </div><!-- end Authentication-->
      </div>
      <!--end menu-body-->
    </div><!-- end main-menu-inner-->
  </div>
  <!-- end leftbar-tab-menu-->

  <!-- Top Bar Start -->
  <!-- Top Bar Start -->
  <div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom" id="navbar-custom">
      <ul class="list-unstyled topbar-nav float-end mb-0">

        <li class="dropdown">
          <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <div class="d-flex align-items-center">
              <img src="{{ asset('') }}assets/images/users/user-vector.png" alt="profile-user"
                class="rounded-circle me-2 thumb-sm" />
              <div>
                <small class="d-none d-md-block font-11">{{ auth()->user()->email }}</small>
                <span class="d-none d-md-block fw-semibold font-12">{{ auth()->user()->name }} <i
                    class="mdi mdi-chevron-down"></i></span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <a class="dropdown-item" href="/profile"><i class="ti ti-user font-16 me-1 align-text-bottom"></i>
                Profile</a>
              <a class="dropdown-item" href="#"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i>
                Settings</a>
              <div class="dropdown-divider mb-0"></div>
              <button type="submit" class="dropdown-item text-danger"><i
                  class="ti ti-power font-16 me-1 align-text-bottom"></i>
                Logout</button>
            </form>
          </div>
        </li><!--end topbar-profile-->
        <li class="notification-list">
          <a class="nav-link arrow-none nav-icon offcanvas-btn" href="#" data-bs-toggle="offcanvas"
            data-bs-target="#Appearance" role="button" aria-controls="Rightbar">
            <i class="ti ti-settings ti-spin"></i>
          </a>
        </li>
      </ul><!--end topbar-nav-->

      <ul class="list-unstyled topbar-nav mb-0">
        <li>
          <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
            <i class="ti ti-menu-2"></i>
          </button>
        </li>
      </ul>
    </nav>
    <!-- end navbar-->
  </div>
  <!-- Top Bar End -->
  <!-- Top Bar End -->

  <div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">

      {{-- content --}}
      @yield('content')
      {{-- / content --}}

      <!--Start Rightbar-->
      <!--Start Rightbar/offcanvas-->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
        <div class="offcanvas-header border-bottom">
          <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
          <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <h6>Account Settings</h6>
          <div class="p-2 text-start mt-3">
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="settings-switch1">
              <label class="form-check-label" for="settings-switch1">Auto updates</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
              <label class="form-check-label" for="settings-switch2">Location Permission</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="settings-switch3">
              <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
            </div><!--end form-switch-->
          </div><!--end /div-->
          <h6>General Settings</h6>
          <div class="p-2 text-start mt-3">
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="settings-switch4">
              <label class="form-check-label" for="settings-switch4">Show me Online</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
              <label class="form-check-label" for="settings-switch5">Status visible to all</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="settings-switch6">
              <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
            </div><!--end form-switch-->
          </div><!--end /div-->
        </div><!--end offcanvas-body-->
      </div>
      <!--end Rightbar/offcanvas-->
      <!--end Rightbar-->

      <!--Start Footer-->
      <!-- Footer Start -->
      <footer class="footer text-center text-sm-start bg-light">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script> TURBO-MAIN <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
            class="mdi mdi-heart text-danger"></i> by <a href="https://turbo-main.com/"
            target="_blank">TURBO-MAIN</a></span>
      </footer>
      <!-- end Footer -->
      <!--end footer-->
    </div>
    <!-- end page content -->
  </div>
  <!-- end page-wrapper -->

  <!-- Javascript  -->
  <!-- vendor js -->

  @yield('scripts')
  <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
  <script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>

  <script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('') }}assets/js/pages/analytics-index.init.js"></script>

  <script src="{{ asset('') }}assets/libs/simple-datatables/umd/simple-datatables.js"></script>
  <script src="{{ asset('') }}assets/js/pages/datatable.init.js"></script>

  <script src="{{ asset('') }}assets/js/pages/form-validation.js"></script>

  <!-- Sweet-Alert  -->
  <script src="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.js"></script>
  <script src="{{ asset('') }}assets/js/pages/sweet-alert.init.js"></script>
  <x-admin.alert></x-admin.alert>

  <!-- App js -->
  <script src="{{ asset('') }}assets/js/app.js"></script>

</body>
<!--end body-->

</html>
