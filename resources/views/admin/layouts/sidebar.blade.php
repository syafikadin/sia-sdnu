<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">SD NU Kepanjen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
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
    </div>
</div>
