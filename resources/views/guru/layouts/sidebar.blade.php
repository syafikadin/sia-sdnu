{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
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
                <a class="nav-link {{ Request::is('guru/nilai*') ? 'active' : '' }}" aria-current="page" href="/guru/nilai">
                <span data-feather="book-open" class="align-text-bottom"></span>
                Penilaian
                </a>
            </li>
        </ul>
    </div>
</nav> --}}

<div id="sidebarMenu" class="col-md-3 col-lg-2 sidebar">
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
                    <a class="btn btn-link w-100 {{ Request::is('guru') ? 'active' : '' }}" href="/guru">
                        <span class="nav-icon fas fa-tachometer-alt me-2"></span>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-link w-100 {{ Request::is('guru/nilai*') ? 'active' : '' }}" href="/guru/nilai">
                        <span class="nav-icon fas fa-user-friends me-2"></span>Penilaian Siswa
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
    </div>
</div>
