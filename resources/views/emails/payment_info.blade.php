<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Info</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-body text-center">
                    <section>
                        <div class="row p-3 justify-content-center">
                            <div class="col-md-7 col-lg-7 col-xl-6 mb-4 mb-md-0">
                                <div class="card p-3 bg-body-tertiary">
                                    <img src="http://127.0.0.1:8000/storage/logo.png" style="width: 46px"
                                        alt="Logo Perusahaan" class="img-fluid logo mb-2 mx-auto d-block">
                                    <h1 class="card-title mb-3">Informasi Pembayaran</h1>

                                    <h4 class="mb-0">{{ $no_reg }}</h4>
                                    <h5 class="mb-3 text-secondary">{{ $profile->nama_d }} {{ $profile->nama_b }}</h5>

                                    <span class="fw-bold">Detail Pendaftaran</span>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Program Studi</span> <span>{{ $prodi->prodi }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Jalur</span> <span>{{ $registration->jalur }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Tahun Akademik</span> <span>{{ $registration->tahun_akademik }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Registration date</span> <span>{{ $registration->created_at }}</span>
                                    </div>
                                    <hr />

                                    <span class="fw-bold">Detail Pembayaran</span>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Bank</span> <span>BNI</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>No. Rekening</span> <span>121211212</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Atas Nama</span> <span>STMIK Rosma</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Biaya Registrasi</span> <span>Rp.
                                            {{ number_format($registration->reg_fee, 0, ',', '.') }}</span>
                                    </div>

                                    <hr />
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Total Pembayaran</span>
                                        <span class="text-success">
                                            <strong>Rp.
                                                {{ number_format($registration->reg_fee, 0, ',', '.') }}
                                            </strong>
                                        </span>
                                    </div>
                                    <hr>
                                    <span class="text-grey">Terima kasih atas pembayaran Anda.</span>
                                    <span>Silakan lakukan pendaftaran ulang dengan mengunggah bukti pembayaran Anda dan
                                        dokumen
                                        pendukung lainnya.
                                    </span>
                                    <a href="http://127.0.0.1:8000/registration" class="mt-3 btn btn-primary">Upload
                                        bukti pembayaran</a>.
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="text-uppercase fw-bold mb-4">PMB STMIK Rosma</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed facere, velit ipsam in
                            repellendus eos ad placeat temporibus beatae pariatur nemo recusandae cumque voluptatem
                            accusantium.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
