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
            <a href="/generating laporan" class="nav-link collapsed">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Laporan</span>
            </a>
        </li>
        @endif
    </ul>
