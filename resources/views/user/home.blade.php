@extends('layout.dashboard-layout')

@section('title', 'Home - ')

@section('nama'){{ $profile->nama_d }}@endsection
@section('style')
    <style>
    </style>
@endsection
@section('content')
    {{-- <div class="position-fixed end-0 px-3" style="width: 50%; z-index: 1050;" id="custom-alert">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Perhatian!!</strong> Hi {{ $profile->nama_d }}, Sepertinya kamu belum menyelesaikan registrasi. Pastikan
            kamu sudah melengkapi dan memilih jalur dan program studi yang sesuai dan klik "Selesaikan Daftar" yah..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div> --}}
    <div class="position-fixed end-0 px-3" style="width: 50%; z-index: 1050;display: none;" id="alertContainer">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Jurusan dan atau Jalur berhasil diperbarui. Silahkan Selesaikan pendaftaran !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!--Main layout-->
    <div class="container pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4">
            {{-- <div class="card">
                <div class="card-body"> --}}
            {{-- <div class="row align-items-center justify-content-center"> --}}
            <div class="row">
                <div class="col-md-5 mb-3">
                    <h3 class="m-3">Apa selanjutnya?</h3>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button data-mdb-collapse-init class="accordion-button" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Selesaikan Pendaftaran!!
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    Setelah kamu melakukan pendaftaran dengan mengisi informasi akun, data diri
                                    hingga
                                    jurusan dan jalur pendaftaran, pastikan kamu melakukan konfirmasi dengan menekan
                                    <strong>Konfirmasi Daftar</strong>. Hal ini diperlukan untuk memastikan bahwa
                                    pilihan program studi dan jalur pendaftaran Anda telah sesuai dengan yang
                                    diinginkan.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Pembayaran Administrasi
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    Setelah kamu melakukan konfirmasi pendaftaran, maka kamu harus melakuan
                                    pembayaran biaya administrasi awal sesuai dengan <strong>program studi</strong>
                                    dan <strong>jalur
                                        pendaftaran</strong> yang sudah kamu pilih. Besaran dan tata cara
                                    pembayaran akan kamu
                                    terima melalui alamat emal yang kamu daftarkan di awal pada web ini.
                                    <strong>Pastikan
                                        bukti pembayaranmu disimpan dengan baik.</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Daftar Ulang
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#accordionExample">
                                <div class="accordion-body">
                                    Setelah selesai melakukan pembayaran biaya administrasi awal, langkah selanjutnya adalah
                                    melakukan pendaftaran ulang dengan mengunggah dokumen yang diperlukan, termasuk bukti
                                    pembayaran administrasi. Setelah proses pendaftaran ulang selesai, Anda akan menerima
                                    bukti registrasi dan informasi mengenai jadwal tes yang akan dilakukan. Pastikan untuk
                                    memperhatikan dan mengikuti petunjuk yang diberikan untuk kelancaran seluruh proses
                                    pendaftaran.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $profile->nama_d }} {{ $profile->nama_b }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">No. Reg: <strong>PMBRSM0001</strong></h6>
                            <p class="card-text">Pastikan kamu sudah melengkapi data diri, memilih jalur dan program
                                studi
                                yang sesuai. Jika sudah, klik lanjutkan dengan
                                mengklik
                                <strong>"Konfirmasi Daftar"</strong> dan selesaikan biaya administrasi.
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Jurusan: <strong
                                        class="badge text-bg-secondary">{{ $prodi->prodi }}</strong></li>
                                <li class="list-group-item">Jalur: <strong
                                        class="badge text-bg-secondary">{{ $registration->jalur }}</strong></li>
                                <li class="list-group-item">Status:
                                    @if ($registration->tgl_verif == null)
                                        <strong class="badge text-bg-warning">Belum menyelesaikan daftar</strong>
                                    @else
                                        <strong class="badge text-bg-info">Menunggu jadwal test</strong>
                                    @endif
                                </li>
                            </ul>
                            <div class="card-body d-flex flex-row-reverse">
                                <button href="#" class="btn btn-primary px-1 mx-1">Konfirmasi Daftar</button>
                                <button class="btn btn-light px-1 mx-1" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Ubah
                                    Jurusan/Jalur</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div>
            </div> --}}
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Jurusan/Jalur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <p class="my-2">
                        Kepada calon mahasiswa, pastikan Anda melakukan riset sebelum
                        memilih program studi. Pahami kurikulum, prospek karir, dan
                        fasilitas pendukung. Ini sangat penting agar Anda bisa membuat
                        keputusan yang tepat sesuai dengan minat dan tujuan Anda di masa
                        depan.
                    </p>
                    <p class="mb-3">
                        Untuk informasi lebih lanjut mengenai syarat prodi dan jalur
                        pendaftaran, silakan <a class="badge text-bg-light" href="/#persyaratan" target="_blank"
                            rel="noopener noreferrer">Klik di sini!</a>
                    </p>
                    <form id="submitForm" action="{{ route('home.update', $registration->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_prodi" class="form-label">Pilih Jurusan</label>
                            <select class="form-select" id="kode_prodi" name="kode_prodi">
                                <option value="RSMTIS1" {{ $registration->kode_prodi == 'RSMTIS1' ? 'selected' : '' }}>
                                    Teknik Informtika</option>
                                <option value="RSMSIS1" {{ $registration->kode_prodi == 'RSMSIS1' ? 'selected' : '' }}>
                                    Sistem Informasi</option>
                                <option value="RSMMID3" {{ $registration->kode_prodi == 'RSMMID3' ? 'selected' : '' }}>
                                    Manajemen Informatika</option>
                                <option value="RSMKAD3" {{ $registration->kode_prodi == 'RSMKAD3' ? 'selected' : '' }}>
                                    Komputerisasi Akuntansi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jalur" class="form-label">Pilih Jalur</label>
                            <select class="form-select" id="jalur" name="jalur">
                                <option value="Reguler" {{ $registration->jalur == 'Reguler' ? 'selected' : '' }}>
                                    Reguler</option>
                                <option value="Prestaka" {{ $registration->jalur == 'Prestaka' ? 'selected' : '' }}>
                                    Prestaka</option>
                                <option value="KIP" {{ $registration->jalur == 'KIP' ? 'selected' : '' }}>
                                    KIP</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                var alertElement = document.getElementById('custom-alert');
                alertElement.remove();
            }, 5000); // 5000 milliseconds = 5 detik
        });

        // alert 
        var alertContainer = document.getElementById('alertContainer');
        var successMessage = "{{ session('success') }}";

        if (successMessage) {
            alertContainer.style.display = 'block';
            setTimeout(function() {
                alertContainer.style.display = 'none';
            }, 5000); // Menghilangkan alert setelah 3 detik (3000 milidetik)
        }
    </script>
@endsection
