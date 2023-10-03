<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #286454">
    <div class="container">
      <a class="navbar-brand" href="/">SIAKAD SD NU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'About') ? 'active' : '' }}" href="/profile">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'All Posts') ? 'active' : '' }}" href="/facilities">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Post Categories') ? 'active' : '' }}" href="/berita">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'User') ? 'active' : '' }}" href="/gallery">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'User') ? 'active' : '' }}" href="/contacts">Kontak</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
          @if(Auth::guard('web')->user())
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Helo {{ Auth::user()->username }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/admin"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right"></i> Logout
                </button>
              </form>
            </ul>
          @else
            <li class="nav-item">
              <a class="nav-link {{ ($title === 'Login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
          @endif
          
        </ul>
      </div>
    </div>
  </nav>