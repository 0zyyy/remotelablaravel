<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Dashboard</li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">Users</li>
        @if (auth()->user()->hak == 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/dashboard/users">
                    <i class="bi bi-person"></i>
                    <span>Pengguna</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard/antrian">
                <i class="bi bi-card-list"></i>
                <span>Antrian</span>
            </a>
        </li>
        <li class="nav-heading">Praktikum</li>
        @if (auth()->user()->hak == 'admin' || auth()->user()->hak == 'dosen')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/monitoringpraktikum">
                    <i class="bi bi-display"></i><span>Monitoring Praktikum</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/data/laporanpraktikum">
                    <i class="bi bi-folder-check"></i>
                    <span>Laporan Praktikum</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="/upload">
                <i class="bi bi-upload"></i>
                <span>Upload Laporan Praktikum</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/data/HasilPraktikum">
                <i class="bi bi-file-earmark"></i>
                <span>Hasil Praktikum</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->
