@extends('layout.main-layout')
@section('content')
    <!-- top-->
    <header class="masthead" id="header">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">STMIK Rosma</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Bergabunglah di STMIK Rosma untuk mengembangkan potensi Anda.
                        Kami hadir dengan pendidikan berkualitas dan peluang karier yang luas. Jadilah bagian dari komunitas
                        yang mendukung dan inspiratif, dan raih impian Anda bersama kami!</h2>
                    <a class="btn btn-light rounded-pill" href="{{ route('register') }}">Daftar</a>
                </div>
            </div>
        </div>
    </header>
    <!-- devider-->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="my-5 col-lg-8">
                    {{-- <h2 class="text-white mb-4">Penerimaan Mahasiswa Baru</h2> --}}
                    {{-- <p class="text-white-50">
                        "Kami selalu membuka penerimaan mahasiswa baru sesuai dengan jadwal yang sudah ditentukan. Informasi
                        lengkap tentang cara mendaftar dan jadwalnya bisa dilihat di situs web resmi kami. Pastikan untuk
                        mengikuti petunjuk yang ada agar proses pendaftaran berjalan lancar. Kami juga siap membantu jika
                        ada pertanyaan tambahan."
                    </p> --}}
                </div>
            </div>
        </div>
    </section>
    {{-- carousel kegiatan --}}
    <section class="text-center" id="kegiatan">
        <h1 class="mx-auto my-0 text-uppercase">Kegiatan Mahasiswa</h1>
        <div class="container px-4 px-lg-5">
            {{-- <img class="img-fluid" src="/img/pmb-1.png" alt="..." /> --}}
            <div class="container mx-auto m-5">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#" target="_blank" rel="noopener noreferrer">
                                <img src="/img/aktivitas-1.jpg" style="max-width:100%; max-height:auto"
                                    class="d-block w-100" alt="...">
                            </a>
                            <div class="carousel-caption d-none d-md-block img-fluid">
                                <h3>Sosialisasi Mengunjungi SMKN 3 Karawang</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id iusto architecto sit neque,
                                    doloremque ab fugiat culpa? Impedit, quas aliquam! Facilis aspernatur magnam explicabo
                                    deserunt
                                    fuga eius voluptatum. Fugit, cum!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/img/aktivitas-2.jpg" style="max-width:100%; max-height:auto" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block img-fluid">
                                <h3>Sosialisasi Mengunjungi SMKN 3 Karawang</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptates deleniti,
                                    officia
                                    blanditiis iste quasi nobis reprehenderit architecto repudiandae quis quia similique
                                    placeat
                                    culpa eveniet consectetur sunt vel, aliquam mollitia.</p>
                            </div>
                        </div>
                        <div class="carousel-item last-carousel-item" style="height: 305px;">
                            <!-- Tinggi disesuaikan dengan kebutuhan -->
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div>
                                    <h5>Klik tombol ini untuk melihat semua aktivitas</h5>
                                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- end carousel kegiatan --}}
    <!-- syarat pendaftaran -->
    <div class="container py-5 px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center" id="persyaratan">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-5 my-0 text-uppercase">Syarat Mendaftar</h1>
                <p class="mt-3">Pendaftaran memiliki empat jalur yaitu: <strong
                        class="badge text-bg-info">Reguler</strong>, <strong class="badge text-bg-danger">Beasiswa
                        Prestaka</strong>, <strong class="badge text-bg-warning">Kartu Indonesia Pintar</strong> dan <strong
                        class="badge text-bg-success">Yaperos</strong>. Berikut
                    adalah syarat yang harus kamu persiapkan</p>
            </div>
        </div>
    </div>
    <section class="page-section bg-light" id="prospek">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-4">
                    {{--  prospek item 1 --}}
                    <div class="prospek-item">
                        <a class="prospek-link" data-bs-toggle="modal" href="#modalReguler">
                            <div class="prospek-hover">
                                <div class="prospek-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/prodi/software-developer.jpg" alt="..." />
                        </a>
                        <div class="prospek-caption text-bg-info">
                            <div class="prospek-caption-heading">REGULER</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    {{--  prospek item 2 --}}
                    <div class="prospek-item">
                        <a class="prospek-link" data-bs-toggle="modal" href="#modalPrestaka">
                            <div class="prospek-hover">
                                <div class="prospek-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/prodi/network-analyst.jpg" alt="..." />
                        </a>
                        <div class="prospek-caption text-bg-danger">
                            <div class="prospek-caption-heading">PRESTAKA</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    {{--  prospek item 3 --}}
                    <div class="prospek-item">
                        <a class="prospek-link" data-bs-toggle="modal" href="#modalKip">
                            <div class="prospek-hover">
                                <div class="prospek-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/prodi/security-analyst.jpg" alt="..." />
                        </a>
                        <div class="prospek-caption text-bg-warning">
                            <div class="prospek-caption-heading">KIP</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    {{--  prospek item 4 --}}
                    <div class="prospek-item">
                        <a class="prospek-link" data-bs-toggle="modal" href="#modalYaperos">
                            <div class="prospek-hover">
                                <div class="prospek-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/prodi/software-developer.jpg" alt="..." />
                        </a>
                        <div class="prospek-caption text-bg-success">
                            <div class="prospek-caption-heading">YAPEROS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end syarat pendaftaran -->


    <!-- cara pendaftaran -->
    <div class="container py-5 px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center" id="cara-daftar">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto mt-5 my-0 text-uppercase">Tata Cara Pendaftaran</h1>
            </div>
        </div>
    </div>
    <section style="background-color: #fff;">
        <div class="container py-5">
            <div class="main-timeline">
                <div class="timeline left">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3>1. Buat Akun & Lengkapi Data Diri</h3>
                            <p class="mb-0">Buat akun dan lengkapi data diri, data diri mencakup alamt hingga riwayat
                                pendidikan terakhir. Informasi yang Anda berikan akan
                                membantu
                                kami memproses pendaftaran Anda dengan lancar dan memberikan dukungan yang sesuai. Daftar
                                melalui <a class="badge text-bg-info" href="{{ url('register') }}" target="_blank"
                                    rel="noopener noreferrer">Link ini</a> </p>
                        </div>
                    </div>
                </div>
                <div class="timeline right">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3>2. Pilih Program Studi</h3>
                            <p class="mb-0">Telusuri program studi yang tersedia dan pilihlah jurusan yang sesuai dengan
                                minat dan keinginan karier Anda. Pastikan untuk mempertimbangkan keahlian dan minat Anda
                                dalam memilih jurusan.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline left">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3>3. Konfirmasi Pendaftaran</h3>
                            <p class="mb-0">Setelah anda memilih jurusan dan jalur pendaftaran yang sesuai, selanjutnya
                                anda harus memverifikasi pendaftaran anda.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline right">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3>4. Pembayaran Administrasi</h3>
                            <p class="mb-0">Lakukan pembayaran biaya administrasi sesuai petunjuk yang dikirimkan melalui
                                email kamu mendaftar. Pastikan
                                untuk menyimpan bukti pembayaran untuk proses verifikasi dan pemrosesan pendaftaran Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="timeline left">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3>5. Daftar Ulang & Upload Bukti Permbayaran</h3>
                            <p class="mb-0">Setelah berhasil melakukan pembayaran administrasi, Anda akan diminta untuk
                                melakukan
                                daftar ulang. Pastikan Anda melengkapi semua dokumen yang disyaratkan dan mengunggah bukti
                                pembayaran melalui form yang disediakan.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline right">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3>5. Test Ofline</h3>
                            <p class="mb-0">Persiapkan diri Anda dengan baik untuk mengikuti tes offline yang telah
                                dijadwalkan. Tes ini akan membantu kami menilai kemampuan dan kualifikasi Anda untuk
                                bergabung di institusi kami.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline left">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3>7. Onboarding</h3>
                            <p class="mb-0">Onboarding akan diumumkan kepada semua mahasiswa terpilih melalui contact
                                center panitia PMB.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end timeline --}}
    <!-- aktivitas-->
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center" id="kegiatan">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto mt-5 my-0 text-uppercase">Kegiatan Mahasiswa</h1>
            </div>
        </div>
    </div>
    <div class="container mx-auto m-5">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#" target="_blank" rel="noopener noreferrer">
                        <img src="/img/aktivitas-1.jpg" style="max-width:100%; max-height:auto" class="d-block w-100"
                            alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block img-fluid">
                        <h3>Sosialisasi Mengunjungi SMKN 3 Karawang</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id iusto architecto sit neque,
                            doloremque ab fugiat culpa? Impedit, quas aliquam! Facilis aspernatur magnam explicabo deserunt
                            fuga eius voluptatum. Fugit, cum!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/aktivitas-2.jpg" style="max-width:100%; max-height:auto" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block img-fluid">
                        <h3>Sosialisasi Mengunjungi SMKN 3 Karawang</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptates deleniti, officia
                            blanditiis iste quasi nobis reprehenderit architecto repudiandae quis quia similique placeat
                            culpa eveniet consectetur sunt vel, aliquam mollitia.</p>
                    </div>
                </div>
                <div class="carousel-item last-carousel-item" style="height: 305px;">
                    <!-- Tinggi disesuaikan dengan kebutuhan -->
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div>
                            <h5>Klik tombol ini untuk melihat semua aktivitas</h5>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- end aktivitas --}}
    <!-- Floating button -->
    <a href="/#header" class="floating-btn" id="floatingBtn"></a>

    {{-- modal --}}
    {{--  prospek Modals --}}
    {{--  prospek item 1 modal popup --}}
    <div class="prospek-modal modal fade" id="modalReguler" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal">
                    <img src="/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="modal-body">
                                <h2 class="text-uppercase">JALUR REGULER</h2>
                                <p class="item-intro text-muted">Persyaratan diserahkan saat daftar ulang dengan melakukan
                                    upload file scan melalui halaman home</p>
                                <p>1. KTP <br> 2. Kartu Keluarga <br>3. Ijazah Terakhir <br>4. Transkip Nilai <br>5.
                                    Melunasi Biaya
                                    Pendaftaran <br>6. Mengikuti Test</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Informasi:</strong>
                                        <a href="http://wa.me/625888888888" target="_blank"
                                            rel="noopener noreferrer">+62858-8888-8888</a>
                                    </li>
                                    <li>
                                        <strong>Email:</strong>
                                        <a href="mailto:stmik@rosma.ac.id">stmik@rosma.ac.id</a>
                                    </li>
                                </ul>
                                <a class="btn text-bg-info btn-xl text-uppercase" href="{{ url('register') }}"
                                    target="_blank" rel="noopener noreferrer">Daftar Sekarang</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  prospek item 2 modal popup --}}
    <div class="prospek-modal modal fade" id="modalPrestaka" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <h2 class="text-uppercase">JALUR PRESTAKA</h2>
                                <p class="item-intro text-muted">Persyaratan diserahkan saat daftar ulang dengan melakukan
                                    upload file scan melalui halaman home</p>
                                <p>1. KTP <br> 2. Kartu Keluarga <br>3. Ijazah <br>4. Scan Raport dari kelas 1 s/d 3 <br>5.
                                    Melunasi Biaya
                                    Pendaftaran <br>6. Mengikuti Test</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Informasi:</strong>
                                        <a href="http://wa.me/625888888888" target="_blank"
                                            rel="noopener noreferrer">+62858-8888-8888</a>
                                    </li>
                                    <li>
                                        <strong>Email:</strong>
                                        <a href="mailto:stmik@rosma.ac.id">stmik@rosma.ac.id</a>
                                    </li>
                                </ul>
                                <a class="btn text-bg-danger btn-xl text-uppercase" href="{{ url('register') }}"
                                    target="_blank" rel="noopener noreferrer">Daftar Sekarang</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  prospek item 3 modal popup --}}
    <div class="prospek-modal modal fade" id="modalKip" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <h2 class="text-uppercase">JALUR KIP</h2>
                                <p class="item-intro text-muted">Persyaratan diserahkan saat daftar ulang dengan melakukan
                                    upload file scan melalui halaman home</p>
                                <p>1. Kartu KIP <br>2. KTP <br>3. Kartu Keluarga <br>4. Ijazah <br>5. Transkip Nilai <br>6.
                                    Melunasi Biaya
                                    Pendaftaran <br>7. Mengikuti Test</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Informasi:</strong>
                                        <a href="http://wa.me/625888888888" target="_blank"
                                            rel="noopener noreferrer">+62858-8888-8888</a>
                                    </li>
                                    <li>
                                        <strong>Email:</strong>
                                        <a href="mailto:stmik@rosma.ac.id">stmik@rosma.ac.id</a>
                                    </li>
                                </ul>
                                <a class="btn text-bg-warning btn-xl text-uppercase" href="{{ url('register') }}"
                                    target="_blank" rel="noopener noreferrer">Daftar Sekarang</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  prospek item 1 modal popup --}}
    <div class="prospek-modal modal fade" id="modalYaperos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal">
                    <img src="/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="modal-body">
                                <h2 class="text-uppercase">JALUR YAPEROS</h2>
                                <p class="item-intro text-muted">Persyaratan diserahkan saat daftar ulang dengan melakukan
                                    upload file scan melalui halaman home</p>
                                <p>1. Surat Pengantar Beasiswa <br>2. KTP <br>3. Kartu Keluarga <br>4. Ijazah <br>5.
                                    Transkip Nilai <br>6. Melunasi Biaya
                                    Pendaftaran <br></p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Informasi:</strong>
                                        <a href="http://wa.me/625888888888" target="_blank"
                                            rel="noopener noreferrer">+62858-8888-8888</a>
                                    </li>
                                    <li>
                                        <strong>Email:</strong>
                                        <a href="mailto:stmik@rosma.ac.id">stmik@rosma.ac.id</a>
                                    </li>
                                </ul>
                                <a class="btn text-bg-success btn-xl text-uppercase" href="{{ url('register') }}"
                                    target="_blank" rel="noopener noreferrer">Daftar Sekarang</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end prospek modals --}}
    {{-- end modal --}}
@endsection
