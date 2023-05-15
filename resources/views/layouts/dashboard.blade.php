<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Pembayaran Spp</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{ url('https://fonts.gstatic.com') }}" rel="preconnect">
    <link href="{{ url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center    justify-content-between">
        <a href="/home" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Pembayaran Spp
            </span>
        </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block dropdown-toggle ps-2">Hi, {{ Auth::user()->nama_petugas }}</span>
    </a><!-- End Profile Iamge Icon -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </a>
            </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header>
<!-- End Header -->


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if(auth()->user()->level == 'admin')
        <li class="nav-heading">Dashboard</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/home">
                <i class="bi bi-window-sidebar"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">Data</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/data-siswa/siswa">
                <i class="bi bi-people"></i>
                <span>Data Siswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/data-petugas/petugas">
                <i class="bi bi-briefcase"></i>
                <span>Data Petugas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/data-kelas/kelas">
                <i class="bi bi-diagram-3"></i>
                <span>Data Kelas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/data-spp/spp">
                <i class="bi bi-file-ruled"></i>
                <span>Data SPP</span>
            </a>
        </li>
        @endif
        @if (auth()->user()->level == 'admin' || 'petugas')
        <li class="nav-heading">Pembayaran</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/entri-pembayaran/pembayaran">
                <i class="bi bi-cart2"></i>
                <span>Entri Pembayaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/histori-pembayaran/histori">
                <i class="bi bi-clock-history"></i>
                <span>Histori Pembayaran</span>
            </a>
        </li>
        @endif
        @if (auth()->user()->level == 'admin')
        <li class="nav-item">
            <a href="/laporan/index" class="nav-link collapsed">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Buat Laporan</span>
            </a>
        </li>
        @endif
    </ul>
</aside>
<!-- End Sidebar-->


@yield('content')


<!-- ======= Footer ======= -->
{{-- <footer id="footer" class="footer">

    @include('part.footer')

</footer>
<!-- End Footer --> --}}



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>
</html>
