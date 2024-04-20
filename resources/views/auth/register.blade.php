<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>

    @include('layout.auth-nav')
    <div class="my-5">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Daftar PMB Rosma</strong></h2>
                    <p style="">Isi dengan lengkap semua field yang dibutuhkan</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <!-- Form -->
                            <form id="msform" class="login">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Akun</strong></li>
                                    <li id="personal"><strong>Personal</strong></li>
                                    <li id="address"><strong>Alamat</strong></li>
                                    <li id="school"><strong>Pendidikan</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                {{-- informasi akun --}}
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Informasi Akun</h4>
                                        <input class="form-control" type="email" name="email" placeholder="Email*"
                                            required />
                                        <input type="password" name="pwd" id="pwd" placeholder="Password"
                                            required />
                                        <input type="password" name="cpwd" id="cpwd"
                                            placeholder="Confirm Password" required />
                                    </div>
                                    <div id="divCheckPasswordMatch" class="text-danger"></div>
                                    <input type="button" name="next" class="next action-button" value="Next"
                                        id="next" />
                                    <div
                                        style="font-family: Inter, ui-sans-serif, system-ui, -apple-system, system-ui, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji; font-size: 1rem; color: white">
                                        Sudah punya akun? <a class="text-white" href="{{ route('login') }}">
                                            <strong>Masuk</strong>
                                        </a>
                                    </div>
                                </fieldset>
                                {{-- informasi personal --}}
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Informasi Personal</h4>
                                        <input type="text" name="nama" placeholder="Nama Lengkap*" required />
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="nik" placeholder="No. Induk KTP"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="kk" placeholder="No. KK*" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="tmpt_lahir" placeholder="Tempat Lahir*"
                                                    required />
                                            </div>
                                            <div class="col-2 text-end">
                                                <p style="color: grey">Tanggal Lahir:*</p>
                                            </div>
                                            <div class="col-4 pl-0">
                                                <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="list-dt form-select" name="jk" id="jk"
                                                    required>
                                                    <option value="" selected>Jenis Kelamin*</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="list-dt form-select" name="agama" id="agama"
                                                    required>
                                                    <option value="" selected>Agama*</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="nohp" placeholder="No. Hp*" required />
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="nohp2"
                                                    placeholder="No. Hp 2 (opsional)" />
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next"
                                        id="next" />
                                </fieldset>
                                {{-- alamat domisili --}}
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Alamat Domisili</h4>
                                        <textarea style="background-color: transparent" rows="1" id="alamat" name="alamat"
                                            placeholder="Jl. XYZ No. X RT XX/RW YY" required></textarea>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="desa" placeholder="Desa / Kelurahan*"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="kecamatan" placeholder="Kecamatan*"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="kota" placeholder="Kab. / Kota*"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="provinsi" placeholder="Provinsi*"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next"
                                        id="next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Pendidikan Terakhir</h4>
                                        <input type="text" name="sekolah" placeholder="Pendidikan Terakhir*"
                                            required />
                                        <div class="row">
                                            <div class="col-6 mt-1">
                                                <input type="text" name="ijazah" placeholder="No. Ijazah*"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <select class="list-dt form-select" id="tahun" name="tahun"
                                                    required>
                                                    <option value="" selected disabled>Tahun lulus</option>
                                                    <!-- Contoh pilihan tahun dari 1900 hingga tahun sekarang -->
                                                    <!-- Anda dapat mengubah rentang tahun sesuai kebutuhan -->
                                                    <?php
                                                    $tahunSekarang = date('Y');
                                                    $tahunAwal = 1900;
                                                    for ($tahun = $tahunSekarang; $tahun >= $tahunAwal; $tahun--) {
                                                        echo "<option value='$tahun'>$tahun</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="make_payment" class="next action-button"
                                        value="Confirm" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title text-center">Success !</h4>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                    class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Font Awesome JS (for icons) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> --}}
    <script src="js/auth/register.js"></script>
</body>

</html>
