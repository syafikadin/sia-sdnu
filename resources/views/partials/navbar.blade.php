<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand " href="/">
            <img src="/img/logo.jpg" alt="" style="height: 40px;"><span style="margin-right: 5px"></span>SD NU
            Kepanjen
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fasilitas">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/berita">Berita</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    @if (!Auth::guard('web')->user())
                <li class="nav-item">
                    <a href="/login"
                        class="btn btn-success text-white px-3 {{ $title === 'Login' ? 'active' : '' }}"><i
                            class="bi bi-box-arrow-in-right mr-2"></i>
                        Login</a>
                </li>
            @elseif (Auth::guard('web')->user()->role == 1)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Helo {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/admin"><i class="bi bi-layout-text-window-reverse"></i>
                            My Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </ul>
            @elseif(Auth::guard('web')->user()->role == 2)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Helo {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/guru"><i class="bi bi-layout-text-window-reverse"></i>
                            My Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </ul>
            @elseif(Auth::guard('web')->user()->role == 3)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Helo {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/siswa"><i class="bi bi-layout-text-window-reverse"></i>
                            My Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </ul>
                @endif
            </ul>
        </div>
    </div>
</nav>
