<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('guru') ? 'active' : '' }}" aria-current="page" href="/guru">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('guru/jadwals*') ? 'active' : '' }}" aria-current="page" href="/guru/teachers">
                <span data-feather="user" class="align-text-bottom"></span>
                Jadwal Pelajaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('guru/nilai*') ? 'active' : '' }}" aria-current="page" href="/guru/nilai">
                <span data-feather="user" class="align-text-bottom"></span>
                Penilaian
                </a>
            </li>
        </ul>
    </div>
</nav>