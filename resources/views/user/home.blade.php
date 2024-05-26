@extends('layout.dashboard-layout')

@section('title', 'Home - ')

@section('nama'){{ $profile->nama_d }}@endsection
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <div class="position-fixed end-0 px-3" style="width: 50%; z-index: 1050;display: none;" id="alertContainer">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!--Main layout-->
    <section class="mb-4">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 m-2" style="width: 135px; height: 135px; overflow: hidden;">
                                <img id="previewImg" src="{{ asset('storage/profiles/' . $profile->profile_pict) }}"
                                    alt="Profile Pict" style="width: 135px; height: 135px; object-fit: cover;">
                            </div>
                            <div class="col-9">
                                <h3 class="card-title">{{ $profile->nama_d }} {{ $profile->nama_b }}</h3>
                                @if ($registration->is_set == true)
                                    <h6 class="card-subtitle mb-2 text-muted">No. Test: <strong>Test1235</strong>
                                    </h6>
                                @else
                                    <h6 class="card-subtitle mb-2 text-muted">No. Reg: <strong>{{ $no_reg }}</strong>
                                    </h6>
                                @endif
                                <div class="d-flex align-items-start flex-column my-3">
                                    <div class="">
                                        <span>Prodi:
                                            <strong class="badge text-bg-success">{{ $prodi->prodi }}</strong>
                                        </span>
                                        <span>
                                            <strong class="badge text-bg-success mr-1">{{ $registration->jalur }}</strong>
                                        </span>
                                        @if ($registration->ranking != null)
                                            <span>
                                                <strong class="badge text-bg-success">Rangking:
                                                    {{ $registration->ranking }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <span>Status:
                                        @if ($registration->is_verif == false)
                                            <strong class="badge text-bg-danger">Belum Konfirmasi</strong>
                                        @elseif($registration->is_verif == true && $registration->appendix_id == null)
                                            <strong class="badge text-bg-warning">Menunggu Pembayaran</strong>
                                    </span>

                                    <div class="">
                                        <span>Biaya: <strong class="badge text-bg-secondary">pendaftaran
                                                (Rp.
                                                {{ number_format($registration->pendaftaran_fee, 0, ',', '.') }})</strong>
                                            +
                                        </span>
                                        <span><strong class="badge text-bg-secondary">registrasi
                                                (Rp.
                                                {{ number_format($registration->reg_fee, 0, ',', '.') }})</strong>
                                        </span>
                                    </div>
                                    <span class="list-group-item">Total Pembayaran: <strong class="badge text-bg-danger">Rp.
                                            {{ number_format($registration->reg_fee + $registration->pendaftaran_fee, 0, ',', '.') }}</strong>
                                    </span>
                                    <span>
                                    @elseif($registration->appendix_id != null && $registration->is_set == false)
                                        <strong class="badge text-bg-info">Menunggu Jadwal Test</strong>
                                    @elseif($registration->appendix_id != null && $registration->is_set == true)
                                        <strong class="badge text-bg-success">Pelaksanaan Test</strong>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">
                            @if ($registration->is_verif == false)
                                Pastikan kamu sudah melengkapi data diri, memilih jalur dan program
                                studi
                                yang sesuai. Jika sudah, klik lanjutkan dengan
                                mengklik
                                <strong>"Konfirmasi Daftar"</strong> dan selesaikan biaya administrasi.
                            @elseif($registration->is_verif == true && $registration->appendix_id == null)
                                Cek email yang kamu daftarkan pada akun ini untuk melihat besaran dan tata cara
                                pembayaran... <strong>Pastikan
                                    bukti pembayaranmu disimpan dengan baik.</strong>
                            @elseif($registration->appendix_id != null && $registration->is_set == false)
                                Terimakasih sudah melakukan pembayaran dan unggah dokumen persyaratan. Pendaftaran kamu
                                sedang direview oleh Tim PMB, mohon cek email atau WhatsApp kamu secara berkala untuk
                                mendapatkan informasi selanjutnya.
                            @elseif($registration->appendix_id != null && $registration->is_set == true)
                                Selamat! Pendaftaran kamu telah berhasil diverifikasi. Kamu telah terdaftar untuk
                                mengikuti tes dengan nomor tes <strong>{ Nomor Test }</strong>. Kami harap kamu dapat
                                mencetak kartu tes sebagai bukti pendaftaran kamu dan untuk akses ke tes yang akan
                                datang. Terima kasih atas partisipasi kamu!<br><br>
                                Seluruh informasi test akan diberikan pada grup WhatsApp yang telah kami kirimkan, atau
                                jika kamu belum menerima undangan Grup, kamu bisa bergabung melalui tombol di bawah
                            @endif

                        </p>

                        <div class="card-body d-flex flex-row-reverse">
                            @if ($registration->is_verif == false)
                                <button type="submit" class="btn btn-danger px-1 mx-1" data-bs-toggle="modal"
                                    data-bs-target="#modalKonfirmasidaftar">Konfirmasi
                                    Daftar</button>

                                <button class="btn btn-light px-1 mx-1" data-bs-toggle="modal"
                                    data-bs-target="#modalJurusan">Ubah
                                    Jurusan/Jalur</button>
                            @elseif($registration->is_verif == true && $registration->appendix_id == null)
                                <a href="" class="btn btn-warning px-1 mx-1" data-bs-toggle="modal"
                                    data-bs-target="#modalBuktiPembayaran">Upload bukti
                                    pembayaran</a>
                            @elseif($registration->is_set == true)
                                <a href="#" class="btn btn-success px-1 mx-1">Gabung Grup WhatsApp</a>
                                <a href="{{ route('test.card.download') }}" target="_blank" rel="noopener noreferrer"
                                    class="btn btn-danger px-1 mx-1">Cetak Kartu
                                    Test</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <h3 class="m-3">Apa selanjutnya?</h3>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button data-mdb-collapse-init class="accordion-button" type="button"
                                data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne"><i class="fa-solid fa-circle-check me-2 opacity-70"></i>Buat
                                Akun dan Lengkapi Data Diri!!
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                Buat akun dengan mengisi semua data yang dibutuhkan, seperti informasi data diri, alamat
                                tempat btinggal hingga riwayat pendidikan teralhir. Selanjutnya login melalui alamat
                                email dan password yang telah didaftarkan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button data-mdb-collapse-init class="accordion-button" type="button"
                                data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="true"
                                aria-controls="collapseTwo">
                                @if ($registration->is_verif == true)
                                    <i class="fa-solid fa-circle-check me-2 opacity-70"></i>
                                @endif
                                Selesaikan Pendaftaran!!
                            </button>
                        </h2>
                        <div id="collapseTwo"
                            class="accordion-collapse collapse {{ $registration->is_verif == true ? '' : 'show' }}"
                            aria-labelledby="headingTwo" data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                Setelah kamu melakukan pendaftaran dengan mengisi informasi akun, data diri
                                hingga
                                jurusan dan jalur pendaftaran, pastikan kamu melakukan konfirmasi dengan menekan
                                <strong>Konfirmasi Daftar</strong>. Hal ini diperlukan untuk memastikan bahwa
                                pilihan program studi dan jalur pendaftaran Kamu telah sesuai dengan yang
                                diinginkan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                @if ($registration->appendix_id != null)
                                    <i class="fa-solid fa-circle-check me-2 opacity-70"></i>
                                @endif
                                Pembayaran Administrasi
                            </button>
                        </h2>
                        <div id="collapseThree"
                            class="accordion-collapse collapse {{ $registration->is_verif == true && $registration->appendix_id == null ? 'show' : '' }}"
                            aria-labelledby="headingThree" data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                Setelah kamu melakukan konfirmasi pendaftaran, maka kamu harus melakuan
                                pembayaran biaya administrasi awal sesuai dengan <strong>program studi</strong>
                                dan <strong>jalur
                                    pendaftaran</strong> yang sudah kamu pilih. Besaran dan tata cara
                                pembayaran akan kamu
                                terima melalui alamat emal yang kamu daftarkan di awal pada web ini.
                                <strong>Pastikan
                                    bukti pembayaranmu disimpan dengan baik.</strong> Dan silahkan upload bukti
                                pembayaran serta dokumen persyaratan lainnya pada tombol yang tersedia pada kartu
                                pendaftaranmu!
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                data-mdb-toggle="collapse" data-mdb-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                @if ($registration->is_set == true)
                                    <i class="fa-solid fa-circle-check me-2 opacity-70"></i>
                                @endif
                                Menunggu Jadwal Test
                            </button>
                        </h2>
                        <div id="collapseFour"
                            class="accordion-collapse collapse {{ $registration->appendix_id != null && $registration->is_set == false ? 'show' : '' }}"
                            aria-labelledby="headingFour" data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                Pada tahap ini proses pendaftaranmu sedang direview oleh tim PMB, selanjutnya kamu
                                <u>menunggu jadwal test yang nantinya akan dikirimkan melalui whatsapp atau email resmi
                                    PMB Rosma</u>. Jadi pastikan nomor hp yang kamu daftarkan terhubung dengan
                                applikasi
                                WhatsApp ya :)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button data-mdb-collapse-init class="accordion-button collapsed" type="button"
                                data-mdb-toggle="collapse" data-mdb-target="#collapseFive" aria-expanded="false"
                                aria-controls="collapseFive">
                                Pelaksanaan Test
                            </button>
                        </h2>
                        <div id="collapseFive"
                            class="accordion-collapse collapse {{ $registration->is_set == true ? 'show' : '' }}"
                            aria-labelledby="headingFour" data-mdb-parent="#accordionExample">
                            <div class="accordion-body">
                                Kami mengimbau Kamu untuk memperhatikan setiap informasi yang kami sampaikan melalui
                                Email atau WhatsApp sebelumnya dengan seksama. Pastikan Kamu sudah <strong>bergabung
                                    dengan grup WhatsApp</strong> dan mengikuti petunjuk yang kami berikan dengan
                                cermat, sehingga proses ini
                                dapat berjalan dengan lancar dan sukses
                            </div>
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
    {{-- modal jurusan --}}
    <div class="modal fade" id="modalJurusan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Jurusan/Jalur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <p class="my-2">
                        Kepada calon mahasiswa, pastikan Kamu melakukan riset sebelum
                        memilih program studi. Pahami kurikulum, prospek karir, dan
                        fasilitas pendukung. Ini sangat penting agar Kamu bisa membuat
                        keputusan yang tepat sesuai dengan minat dan tujuan Kamu di masa
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
                                <option value="Yaperos" {{ $registration->jalur == 'Yaperos' ? 'selected' : '' }}>
                                    Yaperos</option>
                                <option value="KIP" {{ $registration->jalur == 'KIP' ? 'selected' : '' }}>
                                    KIP</option>
                            </select>
                        </div>

                        <div class="mb-3" id="rankingInput" style="display: none;">
                            <label for="ranking" class="form-label">Pilih Ranking Terakhir Sekolah*</label>
                            <select class="form-select" id="ranking" name="ranking">
                                <option disabled value="" {{ $registration->ranking == '' ? 'selected' : '' }}>Pilih
                                    Ranking</option>
                                <option value="A" {{ $registration->ranking == 'A' ? 'selected' : '' }}>1 s/d 5
                                </option>
                                <option value="B" {{ $registration->ranking == 'B' ? 'selected' : '' }}>6 s/d 10
                                </option>
                                <option value="C" {{ $registration->ranking == 'C' ? 'selected' : '' }}>11 s/d 20
                                </option>
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

    {{-- modal daftar Ulang --}}
    <div class="modal fade" id="modalBuktiPembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload Dokumen Persyaratan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">

                    <p class="my-2 text-grey">
                        Mohon untuk mengunggah file persyaratan yang diperlukan serta bukti pembayaran yang telah
                        dilakukan.
                        Silakan
                        unggah file-file tersebut di bawah ini.
                    </p>
                    <form id="submitForm" action="{{ route('appendix.store', $registration->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" hidden name="registration_id" id="formFile"
                            value="{{ $registration->id }}">
                        <div class="mb-2">
                            <label for="ktp" class="form-label">KTP*</label>
                            <input name="ktp" class="form-control" type="file" id="formFile" required
                                accept=".pdf,.jpeg,.jpg,.png">
                        </div>
                        <div class="mb-2">
                            <label for="kk" class="form-label">Kartu KK*</label>
                            <input name="kk" class="form-control" type="file" id="formFile"
                                accept=".pdf,.jpeg,.jpg,.png" required>
                        </div>
                        <div class="mb-2">
                            <label for="ijazah" class="form-label">Ijazah Terakhir*</label>
                            <input name="ijazah" class="form-control" type="file" id="formFile"
                                accept=".pdf,.jpeg,.jpg,.png" required>
                        </div>
                        <div class="mb-2">
                            <label for="transkip" class="form-label">Transkip Nilai*</label>
                            <input name="transkip" class="form-control" type="file" id="formFile"
                                accept=".pdf,.jpeg,.jpg,.png" required>
                        </div>
                        @if ($registration->jalur == 'Prestaka')
                            <div class="mb-2">
                                <label for="raport" class="form-label">Raport*</label>
                                <input name="raport" class="form-control" type="file" id="formFile"
                                    accept=".pdf,.jpeg,.jpg,.png" required>
                            </div>
                        @elseif($registration->jalur == 'KIP')
                            <div class="mb-2">
                                <label for="kip" class="form-label">Kartu KIP*</label>
                                <input name="kip" class="form-control" type="file" id="formFile"
                                    accept=".pdf,.jpeg,.jpg,.png" required>
                            </div>
                        @elseif($registration->jalur == 'Yaperos')
                            <div class="mb-2">
                                <label for="yaperos_letter" class="form-label">Yaperos Letter*</label>
                                <input name="yaperos_letter" class="form-control" type="file" id="formFile"
                                    accept=".pdf,.jpeg,.jpg,.png" required>
                            </div>
                        @endif
                        <div class="mb-2">
                            <label for="bukti_tf" class="form-label">Bukti Pembayaran*</label>
                            <input name="bukti_tf" class="form-control" type="file" id="formFile"
                                accept=".pdf,.jpeg,.jpg,.png" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal konfirmasi daftar-->
    <div class="modal fade" id="modalKonfirmasidaftar" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pendaftaran??
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home.verif', $registration->id) }}" method="post">
                        @csrf
                        <input type="text" name="is_verif" id="is_verif" value="1" hidden>
                        Pastikan kamu sudah yakin dengan pilihan jurusan dan jalur pendaftaran. <strong>Setelah ini data
                            diri dan pilihan program studi tidak bisa diubah kembali</strong>. Jika setelah ini ada
                        perubahan, harap hubungi
                        kontak
                        center PMB.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Iya, Konfirmasi!!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--  End Modal --}}
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var jalurSelect = document.getElementById('jalur');
            var rankingInput = document.getElementById('rankingInput');

            if ("{{ $registration->jalur }}" === 'Prestaka') {
                rankingInput.style.display = 'block';
            } else {
                rankingInput.style.display = 'none';
            }

            jalurSelect.addEventListener('change', function() {
                var jalur = this.value;

                // Cek jika jalur adalah 'Prestaka' dan $registration->ranking tidak null
                if ((jalur === 'Prestaka')) {
                    rankingInput.style.display = 'block';
                } else {
                    rankingInput.style.display = 'none';
                }
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

            setTimeout(function() {
                var alertElement = document.getElementById('custom-alert');
                alertElement.remove();
            }, 5000); // 5000 milliseconds = 5 detik

        });
    </script>
@endsection
