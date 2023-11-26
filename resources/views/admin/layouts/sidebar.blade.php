{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span class="nav-icon fas fa-tachometer-alt me-2"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}" aria-current="page"
                    href="/admin/user">
                    <span class="nav-icon fas fa-user-friends me-2"></span>
                    Data User
                </a>
            </li>
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Data Master</span>
            </h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/guru*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/guru">
                    <span class="fas fa-user-tie nav-icon me-2"></span>
                    Data Guru
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/siswa*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/siswa">
                    <span class="fas fa-users nav-icon me-2"></span>
                    Data Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/kelas*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/kelas">
                    <span class="fas fa-layer-group nav-icon me-2"></span>
                    Data Kelas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/mapel*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/mapel">
                    <span class="fas fa-book nav-icon me-2"></span>
                    Data Mata Pelajaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pembelajaran*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/pembelajaran">
                    <span class="fas fa-book-open nav-icon me-2"></span>
                    Data Pembelajaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/tapel*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/tapel">
                    <span class="fas fa-calendar-week nav-icon me-2"></span>
                    Data Tahun Pelajaran
                </a>
            </li>
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Raport</span>
            </h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/raport*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/raport">
                    <span class="nav-icon fas fa-print me-2"></span>
                    Cetak Raport
                </a>
            </li>
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Data Web</span>
            </h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/news*') ? 'active' : '' }}" aria-current="page"
                    href="/admin/news">
                    <span class="nav-icon fas fa-newspaper me-2"></span>
                    Berita Sekolah
                </a>
            </li>
        </ul>
    </div>
</nav> --}}
<div id="sidebarMenu" class="col-md-3 col-lg-2 sidebar">
    <!-- Logo / Nama Aplikasi -->
    <div class="logo">
        <h3 class="font-weight-bold text-center">SD-NU</h3>
    </div>

    <div class="nav-container">
        <div class="mb-4">
            <p class="indicator font-weight-bold text-small mt-2 mb-2">
                ADMINISTRATOR
            </p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin') ? 'active' : '' }}" href="/admin">
                        <span class="nav-icon fas fa-tachometer-alt me-2"></span>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/user*') ? 'active' : '' }}" href="/admin/user">
                        <span class="nav-icon fas fa-user-friends me-2"></span></i>Data User
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-4">
            <p class="indicator font-weight-bold text-small mt-2 mb-2">
                DATA MASTER
            </p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="btn btn-link w-100{{ Request::is('admin/guru*') ? 'active' : '' }}" href="/admin/guru">
                        <span class="fas fa-user-tie nav-icon me-2"></span>Data Guru
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/siswa*') ? 'active' : '' }}" href="/admin/siswa">
                        <span class="nav-icon fas fa-tachometer-alt me-2"></span>Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/kelas*') ? 'active' : '' }}" href="/admin/kelas">
                        <span class="fas fa-layer-group nav-icon me-2"></span>Data Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/mapel*') ? 'active' : '' }}" href="/admin/mapel">
                        <span class="fas fa-book nav-icon me-2"></span>Data Mata Pelajaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/pembelajaran*') ? 'active' : '' }}"
                        href="/admin/pembelajaran">
                        <span class="fas fa-book-open nav-icon me-2"></span>Data Pembelajaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/tapel*') ? 'active' : '' }}" href="/admin/tapel">
                        <span class="fas fa-calendar-week nav-icon me-2"></span>Data Tahun Pelajaran
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-4">
            <p class="indicator font-weight-bold text-small mt-2 mb-2">
                RAPORT
            </p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/raport*') ? 'active' : '' }}"
                        href="/admin/raport">
                        <span class="nav-icon fas fa-print me-2"></span>Cetak Raport
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <p class="indicator font-weight-bold text-small mt-2 mb-2">
                DATA WEB
            </p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('admin/news*') ? 'active' : '' }}" href="/admin/news">
                        <span class="nav-icon fas fa-newspaper me-3"></span>Berita Sekolah
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="logout mb-2">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-danger py-2 w-100">
                <span data-feather="log-out" class="align-text-bottom"></span> Logout
            </button>
        </form>
        {{-- <button class="btn btn-danger py-2 w-100">Logout</button> --}}
    </div>
</div>
