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
                        <i class="fa-solid fa-gauge me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}" aria-current="page"
                        href="/admin/user">
                        <i class="fa-solid fa-user-group me-2"></i>
                        Data User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/pengumuman') ? 'active' : '' }}" aria-current="page"
                        href="/admin/pengumuman">
                        <i class="fa-solid fa-bullhorn me-2"></i>
                        Pengumuman
                    </a>
                </li>
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Data Master</span>
                </h6>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/guru*') ? 'active' : '' }}" aria-current="page"
                        href="/admin/guru">
                        <i class="fa-solid fa-chalkboard-user me-2"></i>
                        Data Guru
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/siswa*') ? 'active' : '' }}" aria-current="page"
                        href="/admin/siswa">
                        <i class="fa-solid fa-users me-2"></i>
                        Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/kelas*') ? 'active' : '' }}" aria-current="page"
                        href="/admin/kelas">
                        <i class="fa-solid fa-landmark me-2"></i>
                        Data Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/mapel*') ? 'active' : '' }}" aria-current="page"
                        href="/admin/mapel">
                        <i class="fa-solid fa-book me-2"></i>
                        Data Mata Pelajaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/pembelajaran*') ? 'active' : '' }}" aria-current="page"
                        href="/admin/pembelajaran">
                        <i class="fa-solid fa-book-open me-2"></i>
                        Data Pembelajaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/tapel*') ? 'active' : '' }}" aria-current="page"
                        href="/admin/tapel">
                        <i class="fa-solid fa-calendar-week me-2"></i>
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
                        <i class="fa-solid fa-print me-2"></i>
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
                        <i class="fa-solid fa-newspaper me-2"></i>
                        Berita Sekolah
                    </a>
                </li>
            </ul>

            <div class="logout">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-4 py-2 w-100">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
