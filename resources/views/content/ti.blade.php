@extends('layout.main-layout')

@section('title')
    TI -
@endsection
@section('style')
    <style>
        /* Carousel styling */
        #introCarousel,
        .carousel-inner,
        .carousel-item,
        .carousel-item.active {
            height: 100vh;
        }

        .carousel-item:nth-child(1) {
            background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .carousel-item:nth-child(2) {
            background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .carousel-item:nth-child(3) {
            background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
            #introCarousel {
                margin-top: -58.59px;
            }

            #introCarousel,
            .carousel-inner,
            .carousel-item,
            .carousel-item.active {
                height: 50vh;
            }
        }
    </style>
@endsection
@section('content')
    {{--  Content --}}

    {{-- header --}}
    <header class="prodihead" id="header">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Teknik Informatika</h1>
                </div>
            </div>
        </div>
    </header>
    {{-- end header --}}

    {{--  Isi Konten --}}
    <div class="vg-page page-contact" id="contact">
        <div class="container-fluid">
            <div class="container text-justify justify-content-center py-5 mx-25">
                {{-- Visi dan Misi --}}
                <h4>Visi Program Studi Teknik Informatika</h4>
                <p class="mb-3 blockquote">
                    Menjadi program studi yang unggul dan dapat menghasilkan lulusan yang mampu membangun sistem yang
                    berguna bagi masyarakat serta berdaya saing tinggi untuk memenuhi kebutuhan tenaga kerja dalam bidang
                    Informatika.
                </p>

                <h4>Misi</h4>
                <ol>
                    <li><b>Optimalisasi Kemampuan Sistem Terintegrasi dalam Penyelesaian Masalah dan Solusi</b></li>
                    <p>Meningkatkan kemampuan untuk membangun dan menggunakan sistem terintegrasi dalam rangka menyelesaikan
                        masalah dan solusinya.</p>
                    <li><b>Inovasi dalam Implementasi Sistem Terintegrasi dan Fasilitas Pembelajaran</b></li>
                    <p>Meningkatkan kemampuan dan mengimplementasikan sistem terintegrasi dan menyediakan fasilitas
                        penunjang proses pembelajarannya.</p>
                    <li><b>Pembangunan Ilmuwan Bermoral, Terampil, dan Kreatif melalui Penelitian dan Praktek</b></li>
                    <p>Meningkatkan kemampuan untuk membangun dan melakukan penelitian dalam rangka menerapkan teori dan
                        praktek serta mendidik mahasiswa menjadi ilmuwan yang bermoral, terampil dan kreatif.</p>
                    <li><b>Mendorong Kreativitas melalui Pelatihan, Seminar, dan Penelitian Ilmiah</b></li>
                    <p>Meningkatkan kemampuan untuk membangun kreativitas melalui aktivitas Pelatihan, Seminar dan
                        Penelitian Ilmiah.</p>
                </ol>
                {{-- end visi dan misi --}}

                {{-- kurikulum --}}
                <h4>Kurikulum</h4>
                <p>Program studi Teknik Informatika di STMIK Rosma memiliki kurikulum yang menggabungkan teori dan praktik,
                    mencakup:</p>
                <ul>
                    <li>Pemrograman Komputer</li>
                    <li>Sistem Operasi</li>
                    <li>Basis Data</li>
                    <li>Jaringan Komputer</li>
                    <li>Keamanan Informasi</li>
                    <li>Pengembangan Aplikasi Web</li>
                    <li>Manajemen Proyek TI</li>
                    <li>Kecerdasan Buatan</li>
                    <li>dan lainnya</li>
                </ul>
                <p>Untuk melihat kurikulum lengkap, silahkan <a href="link_ke_file_kurikulum.pdf" download>klik disini untuk
                        mengunduh file kurikulum</a>.</p>
                {{-- end Kurikulum --}}

                {{-- prospek karir --}}
                <h4>Peluang Karier yang Luas</h4>
                <p>Lulusan program Teknik Informatika di STMIK Rosma memiliki peluang karier yang sangat luas. Berikut
                    beberapa posisi yang dapat dijalani:</p>

                <section class="page-section bg-light" id="prospek">
                    <div class="container">
                        {{-- <div class="text-center">
                        <h2 class="section-heading text-uppercase">prospek</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div> --}}
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 mb-4">
                                {{--  prospek item 1 --}}
                                <div class="prospek-item">
                                    <a class="prospek-link" data-bs-toggle="modal" href="#prospekModal1">
                                        <div class="prospek-hover">
                                            <div class="prospek-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img class="img-fluid" src="/img/prodi/software-developer.jpg" alt="..." />
                                    </a>
                                    <div class="prospek-caption">
                                        <div class="prospek-caption-heading">Software Developer</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 mb-4">
                                {{--  prospek item 2 --}}
                                <div class="prospek-item">
                                    <a class="prospek-link" data-bs-toggle="modal" href="#prospekModal2">
                                        <div class="prospek-hover">
                                            <div class="prospek-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img class="img-fluid" src="/img/prodi/network-analyst.jpg" alt="..." />
                                    </a>
                                    <div class="prospek-caption">
                                        <div class="prospek-caption-heading">Network Administrator</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 mb-4">
                                {{--  prospek item 3 --}}
                                <div class="prospek-item">
                                    <a class="prospek-link" data-bs-toggle="modal" href="#prospekModal3">
                                        <div class="prospek-hover">
                                            <div class="prospek-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img class="img-fluid" src="/img/prodi/security-analyst.jpg" alt="..." />
                                    </a>
                                    <div class="prospek-caption">
                                        <div class="prospek-caption-heading">IT Security Analyst</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <p>Dan tentunya masih banyak lagi berbagai posisi lainnya di industri teknologi informasi sesuai minat dan
                    keahlian seperti Mobile Developer hingga IT System Analyst. Dengan kurikulum yang komprehensif dan
                    dukungan dari dosen berpengalaman, lulusan STMIK Rosma siap bersaing dan berkembang di dunia kerja yang
                    dinamis dan menantang.</p>
                {{-- end proskpek karir --}}

            </div>
        </div>
    </div>
    {{--  End isi konten --}}

    {{-- daftar sekarang --}}
    <section class="prodi-parallax">
        <div class="prodi-overlay-bg"></div>
        <div class="prodi-content">
            <h2>Ingin Bergabung dengan Program Teknik Informatika?</h2>
            <p>Jangan lewatkan kesempatan untuk memulai perjalanan karier yang cerah dengan bergabung di program Teknik
                Informatika di STMIK Rosma!</p>
            <a href="{{ route('register') }}" class="prodi-btn-daftar">Daftar Sekarang</a>
            <div class="prodi-contact-info">
                <p>atau</p>
                <p>Hubungi kami untuk informasi lebih lanjut:</p>
                <p>WhatsApp:
                    <a style="text-decoration: none" href="https://wa.me/6281234567890">0812-3456-7890</a>
                </p>
                <p>Email:
                    <a style="text-decoration: none" href="mailto:stmik@rosma.ac.id">stmik@rosma.ac.id</a>
                </p>
            </div>
        </div>
    </section>
    {{-- end daftar sekarang --}}

    {{-- floating button --}}
    <a href="ti#header" class="floating-btn" id="floatingBtn"></a>

    {{-- modal --}}
    {{--  prospek Modals --}}
    {{--  prospek item 1 modal popup --}}
    <div class="prospek-modal modal fade" id="prospekModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal">
                    <img src="/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                {{--  Project details --}}
                                <h2 class="text-uppercase">Software Developer</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" width="160px"
                                    src="/img/prodi/software-developer.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Threads
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  prospek item 2 modal popup --}}
    <div class="prospek-modal modal fade" id="prospekModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                {{--  Project details --}}
                                <h2 class="text-uppercase">Network Administrator</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" width="160px"
                                    src="/img/prodi/network-analyst.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Explore
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Graphic Design
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  prospek item 3 modal popup --}}
    <div class="prospek-modal modal fade" id="prospekModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                {{--  Project details --}}
                                <h2 class="text-uppercase">IT Security Analyst</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" width="160px"
                                    src="/img/prodi/security-analyst.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Finish
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Identity
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
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
