<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/students*') ? 'active' : '' }}" aria-current="page" href="/admin/students">
                <span data-feather="users" class="align-text-bottom"></span>
                Data Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/teachers*') ? 'active' : '' }}" aria-current="page" href="/admin/teachers">
                <span data-feather="user" class="align-text-bottom"></span>
                Data Guru
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/jadwals*') ? 'active' : '' }}" aria-current="page" href="/admin/teachers">
                <span data-feather="user" class="align-text-bottom"></span>
                Jadwal Pelajaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/rapors*') ? 'active' : '' }}" aria-current="page" href="/admin/teachers">
                <span data-feather="user" class="align-text-bottom"></span>
                Rapor
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/penilaians*') ? 'active' : '' }}" aria-current="page" href="/admin/teachers">
                <span data-feather="user" class="align-text-bottom"></span>
                Penilaian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/beritas*') ? 'active' : '' }}" aria-current="page" href="/admin/teachers">
                <span data-feather="user" class="align-text-bottom"></span>
                Berita Sekolah
                </a>
            </li>
        </ul>
    </div>
</nav>