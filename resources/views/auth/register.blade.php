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
                            <form action="{{ route('register.save') }}" method="post" id="msform" class="login"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Akun</strong></li>
                                    <li id="personal"><strong>Personal</strong></li>
                                    <li id="address"><strong>Alamat</strong></li>
                                    <li id="school"><strong>Pendidikan</strong></li>
                                    <li id="prodi"><strong>Prodi</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                {{-- informasi akun --}}
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Informasi Akun</h4>
                                        <input class="form-control" type="email" name="email" placeholder="Email*"
                                            required />
                                        <input type="password" name="password" id="pwd" placeholder="Password"
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
                                        {{-- profil pict --}}
                                        <div class="text-center py-5">
                                            <div id="imageContainer" class="square position-relative display-2 mb-3">
                                                <img id="previewImg" src="storage/profiles/default-profile-icon.png"
                                                    alt="Preview Image">
                                            </div>
                                            <input type="file" id="customFile" name="profile_pict" accept="image/*"
                                                onchange="validateAndPreview(event)" hidden>
                                            <label class="mx-1 btn btn-success-soft" for="customFile">Pilih</label>
                                            <button type="button" id="removeBtn"
                                                class="mx-1 btn btn-danger-soft">Hapus</button>
                                            <p class="mt-3 mb-0 text-white"><span
                                                    class="me-1"><b>Note:</b></span>.jpg/jpeg/png
                                                dengan maksimal 500KB</p>
                                        </div>
                                        {{-- data --}}
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="nama_d" placeholder="Nama Depan*"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="nama_b" placeholder="Nama Belakang" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="nik" placeholder="No. Induk KTP"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="nkk" placeholder="No. KK*" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir*"
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
                                                <input type="text" name="no_hp" placeholder="No. Hp/WhatsApp*"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="no_hp2"
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
                                {{-- pedndidikan --}}
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Pendidikan Terakhir</h4>
                                        <input type="text" name="pend_terakhir" placeholder="Pendidikan Terakhir*"
                                            required />
                                        <div class="row">
                                            <div class="col-6 mt-1">
                                                <input type="text" name="no_ijazah" placeholder="No. Ijazah*"
                                                    required />
                                            </div>
                                            <div class="col-6">
                                                <select class="list-dt form-select" id="tahun" name="tahun_lulus"
                                                    required>
                                                    <option value="" selected disabled>Tahun lulus</option>
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
                                    <input type="button" name="next" class="next action-button" value="Next"
                                        id="next" />
                                </fieldset>
                                {{-- prodi --}}
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Program Study</h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="row justify-content-end">
                                                        <select class="list-dt form-select" id="prodi"
                                                            name="prodi" required>
                                                            <option value="" selected disabled>Pilih
                                                                prodi</option>
                                                            @foreach ($prodies as $kode_prodi => $prodi)
                                                                <option value="{{ $kode_prodi }}">
                                                                    {{ $prodi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <select class="list-dt form-select" id="jalur"
                                                            name="jalur" required>
                                                            <option value="" selected disabled>Pilih
                                                                jalur</option>
                                                            <option value="Reguler">Reguler</option>
                                                            <option value="Prestaka">Prestaka</option>
                                                            <option value="Yaperos">Yaperos</option>
                                                            <option value="KIP">KIP</option>
                                                        </select>
                                                    </div>
                                                    <div class="row justify-content-end" id="rankingInput"
                                                        style="display: none;">
                                                        <select class="list-dt form-select" id="ranking"
                                                            name="ranking">
                                                            <option disabled selected value="">Pilih Ranking
                                                            </option>
                                                            <option value="A">1 s/d 5</option>
                                                            <option value="B">6 s/d 10</option>
                                                            <option value="C">11 s/d 20</option>
                                                        </select>
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <select class="list-dt form-select" id="tahun_akademik"
                                                            name="tahun_akademik" disabled>
                                                            <option selected
                                                                value="{{ date('Y') }}/{{ date('Y') + 1 }}">Tahun
                                                                Akademik
                                                                {{ date('Y') }}/{{ date('Y') + 1 }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="text-align: justify;">
                                                <h6 class="">Penting!!</h6>
                                                <p class="my-2">
                                                    Kepada calon mahasiswa, pastikan Anda melakukan riset sebelum
                                                    memilih program studi. Pahami kurikulum, prospek karir, dan
                                                    fasilitas pendukung. Ini sangat penting agar Anda bisa membuat
                                                    keputusan yang tepat sesuai dengan minat dan tujuan Anda di masa
                                                    depan.
                                                </p>
                                                <p class="mb-2">
                                                    Selain itu, pastikan juga bahwa Anda telah memenuhi
                                                    <strong><u>syarat-syarat</u></strong> yang
                                                    dibutuhkan untuk program studi tersebut dan memilih jalur
                                                    pendaftaran
                                                    yang sesuai.
                                                </p>
                                                <p class="mb-3">
                                                    Untuk informasi lebih lanjut mengenai syarat prodi dan jalur
                                                    pendaftaran, silakan <a class="badge text-bg-light"
                                                        href="/#persyaratan" target="_blank"
                                                        rel="noopener noreferrer">Klik di sini!</a>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="divCheckInput" class="text-danger"></div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="submit" id="submitButton" class="action-button" value="Daftar" />
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
    @if ($errors->any())
        <script>
            alert("{{ $errors->first('email') }}");
        </script>
    @endif
    <script>
        // Fungsi untuk validasi dan preview gambar
        document.getElementById('imageContainer').addEventListener('click', function() {
            document.getElementById('customFile').click();
        });

        function validateAndPreview(event) {
            var selectedFile = event.target.files[0];
            var previewImg = document.getElementById('previewImg');

            if (selectedFile) {
                // Validasi ukuran file
                if (selectedFile.size > 500 * 1024) {
                    alert('Ukuran gambar melebihi batas maksimum (500KB).');
                    document.getElementById('customFile').value = ''; // Reset input file
                    previewImg.src = 'storage/profiles/default-profile-icon.png'; // Tampilkan gambar default
                    return;
                }

                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = new Image();
                    img.src = e.target.result;

                    img.onload = function() {
                        var canvas = document.createElement('canvas');
                        var ctx = canvas.getContext('2d');

                        // Konversi gambar menjadi ukuran 300x300 pixel
                        var scaleFactor = Math.min(300 / img.width, 300 / img.height);
                        canvas.width = img.width * scaleFactor;
                        canvas.height = img.height * scaleFactor;
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                        previewImg.src = canvas.toDataURL('image/jpeg'); // Tampilkan gambar di dalam canvas
                    };
                };

                reader.readAsDataURL(selectedFile);
            }
        }

        function removeImage() {
            var previewImg = document.getElementById('previewImg');
            previewImg.src = 'storage/profiles/default-profile-icon.png'; // Tampilkan gambar default
            var customFileInput = document.getElementById('customFile');
            customFileInput.value = ''; // Reset input file
        }

        // Event listener untuk tombol Remove
        var removeBtn = document.getElementById('removeBtn');
        removeBtn.addEventListener('click', removeImage);


        var jalurSelect = document.getElementById('jalur');
        var rankingInput = document.getElementById('rankingInput');
        jalurSelect.addEventListener('change', function() {
            var jalur = this.value;

            if ((jalur === 'Prestaka')) {
                rankingInput.style.display = 'block';
            } else {
                rankingInput.style.display = 'none';
            }
        });
    </script>
</body>

</html>
