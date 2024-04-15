@extends('template.template')

@section('title')
    Halaman Utama
@endsection

@section('content')
<!-- top-->
<header class="masthead" id="header">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">STMIK Rosma</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Bergabunglah di STMIK Rosma untuk mengembangkan potensi Anda. Kami hadir dengan pendidikan berkualitas dan peluang karier yang luas. Jadilah bagian dari komunitas yang mendukung dan inspiratif, dan raih impian Anda bersama kami!</h2>
                <a class="btn btn-light rounded-pill" href="#about">Daftar</a>
            </div>
        </div>
    </div>
</header>
<!-- tentang-->
<section class="about-section text-center" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4">Penerimaan Mahasiswa Baru</h2>
                <p class="text-white-50">
                    "Kami selalu membuka penerimaan mahasiswa baru sesuai dengan jadwal yang sudah ditentukan. Informasi lengkap tentang cara mendaftar dan jadwalnya bisa dilihat di situs web resmi kami. Pastikan untuk mengikuti petunjuk yang ada agar proses pendaftaran berjalan lancar. Kami juga siap membantu jika ada pertanyaan tambahan."
                </p>
            </div>
        </div>
        <img class="img-fluid" src="/img/pmb-1.png" alt="..." />
    </div>
</section>

<!-- timeline-->
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
                        <h3>1. Buat Akun</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia omnis blanditiis placeat eum adipisci a temporibus quo nobis, veniam autem optio. Sint accusamus quasi eius esse error omnis optio qui?</p>
                    </div>
                </div>
            </div>
            <div class="timeline right">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3>2. Lengkapi Data Diri</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus at veritatis atque iusto ea enim! Iste distinctio, tenetur at impedit dicta exercitationem! Excepturi sit aperiam nihil, nulla ipsum dolorem esse.</p>
                    </div>
                </div>
            </div>
            <div class="timeline left">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3>3. Pilih Program Studi</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus at veritatis atque iusto ea enim! Iste distinctio, tenetur at impedit dicta exercitationem! Excepturi sit aperiam nihil, nulla ipsum dolorem esse.</p>
                    </div>
                </div>
            </div>
            <div class="timeline right">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3>4. Pembayaran Administrasi</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus at veritatis atque iusto ea enim! Iste distinctio, tenetur at impedit dicta exercitationem! Excepturi sit aperiam nihil, nulla ipsum dolorem esse.</p>
                    </div>
                </div>
            </div>
            <div class="timeline left">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3>5. Test Ofline</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus at veritatis atque iusto ea enim! Iste distinctio, tenetur at impedit dicta exercitationem! Excepturi sit aperiam nihil, nulla ipsum dolorem esse.</p>
                    </div>
                </div>
            </div>
            <div class="timeline right">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3>6. Pengambilan KTM</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus at veritatis atque iusto ea enim! Iste distinctio, tenetur at impedit dicta exercitationem! Excepturi sit aperiam nihil, nulla ipsum dolorem esse.</p>
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
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="#" target="_blank" rel="noopener noreferrer">
                    <img src="/img/aktivitas-1.jpg" style="max-width:100%; max-height:auto" class="d-block w-100" alt="...">
                </a>
                <div class="carousel-caption d-none d-md-block img-fluid">
                    <h3>Sosialisasi Mengunjungi SMKN 3 Karawang</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id iusto architecto sit neque, doloremque ab fugiat culpa? Impedit, quas aliquam! Facilis aspernatur magnam explicabo deserunt fuga eius voluptatum. Fugit, cum!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/aktivitas-2.jpg" style="max-width:100%; max-height:auto" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block img-fluid">
                    <h3>Sosialisasi Mengunjungi SMKN 3 Karawang</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptates deleniti, officia blanditiis iste quasi nobis reprehenderit architecto repudiandae quis quia similique placeat culpa eveniet consectetur sunt vel, aliquam mollitia.</p>
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
{{-- end aktivitas --}}
<!-- Floating button -->
<a href="/#header" class="floating-btn" id="floatingBtn"></a>
@endsection
