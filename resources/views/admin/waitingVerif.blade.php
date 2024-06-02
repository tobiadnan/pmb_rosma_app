@extends('layout.dashboard-layout')

@section('title')
    Register - PMB
@endsection
<!--Main layout-->
@section('content')
    <div class="position-fixed end-0 px-3" style="width: 50%; z-index: 1050;display: none;" id="alertContainer">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Section: Tabel list camaba -->
    <section class="mb-4">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center"><strong>Menunggu Verifikasi Admin</strong></h5>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
    <!-- Section: Tabel list camaba -->

    <!--Main layout-->

    {{-- modal --}}
    <div class="modal fade" id="appendixModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="imageModalLabel">Verifikasi</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- row data 1 --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text-end">
                                <img src="" id="appendixKtp" class=" top-50 end-0" alt="Gambar Lampiran"
                                    style="width: 70%;">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h3>Data Mahasiswa</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    Nama
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="nama"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    NIK
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="nkk"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Tempat, Tgl Lahir
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="ttl"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Jenis Kelamin
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="jk"></span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- end data 1 --}}
                    {{-- row data 2 --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text-end">
                                <img src="" id="appendixIjazah" class=" top-50 end-0" alt="Gambar Lampiran"
                                    style="width: 70%;">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h3>Data Sekolah</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    Asal Sekolah
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="pend_terakhir"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    No. Ijazah
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="no_ijazah"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Tahun Lulus
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="tahun_lulus"></span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- end data 2 --}}
                    {{-- row data 3 --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text-end">
                                <img src="" id="appendixBuktiTf" class=" top-50 end-0" alt="Gambar Lampiran"
                                    style="width: 70%;">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h3>Konfirmasi Pembayaran</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    No. Reg
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="noReg"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Program Studi
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="prodi"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Jalur
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary"><span id="jalur"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Biaya Pendaftaran
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary">Rp. <span
                                            id="pendaftaran_fee"></span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Biaya Registrasi
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-secondary">Rp. <span id="reg_fee"></span></strong>
                                </div>
                            </div>
                            <hr class="my-1">
                            <div class="row">
                                <div class="col-md-4">
                                    Total Pembayaran
                                </div>
                                <div class="col-md-8">
                                    : <strong class="badge text-bg-primary">Rp. <span id="biaya"></span></strong>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    {{-- end data 3 --}}
                </div>
                <div class="modal-footer">
                    <form id="submitForm" action="{{ route('admin.waiting_verif.verif') }}" method="post">
                        @csrf
                        <input type="text" id="idReg" name="idReg" value="" hidden />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-danger">Tolak</button>
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection
@section('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        function openModal(
            ktp, nkk, nama, ttl, jk,
            ijazah, pend_terakhir, no_ijazah, tahun_lulus,
            bukti_tf, prodi, jalur, reg_fee, pendaftaran_fee, totalBiaya,
            id, noReg
        ) {

            function formatAngka(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
            document.getElementById('idReg').value = id;

            // data mahasiswa
            document.getElementById('appendixKtp').src = "{{ asset('storage/appendix_files/') }}" + "/" + ktp;
            document.getElementById('nkk').textContent = nkk;
            document.getElementById('nama').textContent = nama;
            document.getElementById('ttl').textContent = ttl;
            document.getElementById('jk').textContent = jk;
            // data sekolah
            document.getElementById('appendixIjazah').src = "{{ asset('storage/appendix_files/') }}" + "/" + ijazah;
            document.getElementById('pend_terakhir').textContent = pend_terakhir;
            document.getElementById('no_ijazah').textContent = no_ijazah;
            document.getElementById('tahun_lulus').textContent = tahun_lulus;

            // data bukti tf
            document.getElementById('appendixBuktiTf').src = "{{ asset('storage/appendix_files/') }}" + "/" + bukti_tf;
            document.getElementById('noReg').textContent = noReg;
            document.getElementById('prodi').textContent = prodi;
            document.getElementById('jalur').textContent = jalur;
            document.getElementById('reg_fee').textContent = formatAngka(reg_fee);
            document.getElementById('pendaftaran_fee').textContent = formatAngka(pendaftaran_fee);
            document.getElementById('biaya').textContent = formatAngka(totalBiaya);

            // Tampilkan informasi tambahan di dalam modal

            // Tampilkan modal
            $('#appendixModal').modal('show');
        }
    </script>
@endsection
