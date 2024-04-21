<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid mx-2">
        <button class="navbar-toggler navbar-toggler-right mb-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse mx-2" id="navbarNavDropdown">
            {{-- brand --}}
            <a class="navbar-brand" href="/">
                <img src="img/logo.png" height="52" class="h-8" alt="STMIK Rosma logo" />
            </a>
            {{-- left --}}
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tentang PMB Rosma
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/#persyaratan">Persyaratan</a></li>
                        <li><a class="dropdown-item" href="/#cara-daftar">Cara Mendaftar</a></li>
                        <li><a class="dropdown-item" href="/#kegiatan">Kegiatan Mahasiswa</a></li>

                        <li class="dropdown dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Biaya Kuliah
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Reguler</a></li>
                                <li><a class="dropdown-item" href="#">Prestaka</a></li>
                                <li><a class="dropdown-item" href="#">KIP</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Program Studi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/ti">Teknik Informatika</a></li>
                        <li><a class="dropdown-item" href="/si">Sistem Informasi</a></li>
                        <li><a class="dropdown-item" href="/mi">Manajemen Informatika</a></li>
                        <li><a class="dropdown-item" href="/ka">Komputerisasi Akuntansi</a></li>
                    </ul>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Beasiswa
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/prestaka">Prestaka</a></li>
                        <li><a class="dropdown-item" href="/yaperos">Yaperos</a></li>
                        <li><a class="dropdown-item" href="/kip">KIP</a></li>
                        <li><a class="dropdown-item" href="/kacer">Karawang Cerdas</a></li>
                    </ul>

                </div>
            </div>
        </div>
        {{-- right --}}
        <div class="d-flex align-items-center">
            @if (Route::has('login'))
                @auth
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="/img/profile/default-profile-icon.png" class="rounded-circle" height="32"
                                alt="" loading="lazy" /></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
                        </ul>
                    </div>
                @else
                    <a class="nav-link mr-0" href="{{ route('login') }}">Masuk</a>
                    @if (Route::has('register'))
                        <a class="nav-link btn btn-info p-2" style="color: white" href="{{ route('register') }}">Daftar</a>
                    @endif
                @endauth
            @endif

        </div>
    </div>
</nav>
