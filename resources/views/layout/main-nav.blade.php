
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container-fluid mx-2">
        <button class="navbar-toggler navbar-toggler-right mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			Menu
            <i class="fas fa-bars"></i>
        </button>
		<div class="collapse navbar-collapse mx-2" id="navbarNavDropdown">
			{{-- brand --}}
			<a class="navbar-brand" href="/">
				<img src="img/logo.png" height="52" class="h-8" alt="STMIK Rosma logo"/>
			</a>
			{{-- left --}}
			<div class="navbar-nav me-auto mb-2 mb-lg-0">
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Tentang PMB Rosma
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/#persyaratan">Persyaratan</a>
						<a class="dropdown-item" href="/#cara-daftar">Cara Mendaftar</a>
						<a class="dropdown-item" href="/#kegiatan">Kegiatan Mahasiswa</a>

						{{-- <div class="dropdown dropend dropdown-hover">
							<a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Biaya Kuliah</a>
							<ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
								<li><a class="dropdown-item" href="#">Reguler</a></li>
								<li><a class="dropdown-item" href="#">Prestaka</a></li>
								<li><a class="dropdown-item" href="#">KIP</a></li>
							</ul>
						</div> --}}

						
					</div>
				</div>
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Program Studi
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/ti">Teknik Informatika</a>
						<a class="dropdown-item" href="/si">Sistem Informasi</a>
						<a class="dropdown-item" href="/mi">Manajemen Informatika</a>
						<a class="dropdown-item" href="/ka">Komputerisasi Akuntansi</a>
					</div>
				</div>
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Beasiswa
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/prestaka">Prestaka</a>
						<a class="dropdown-item" href="/yaperos">Yaperos</a>
						<a class="dropdown-item" href="/kip">KIP</a>
						<a class="dropdown-item" href="/kacer">Karawang Cerdas</a>
					</div>
					
				</div>
			</div>
		</div>
		{{-- right --}}
		<div class="d-flex align-items-center">
			@if (Route::has('login'))
			@auth
			<!-- Avatar -->
			<div class="dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22" alt="" loading="lazy" /></a>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">My profile</a>
					<a class="dropdown-item" href="#">Settings</a>
					<a class="dropdown-item" href="{{ url('/logout') }}">Keluar</a>
				</div>
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