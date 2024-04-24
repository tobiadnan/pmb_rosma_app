@extends('layout.dashboard-layout')

@section('title', 'Profile - ')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <style>
        .rounded {
            border-radius: 5px !important;
        }

        .file-upload .square {
            height: 250px;
            width: 250px;
            margin: auto;
            vertical-align: middle;
            border: 2px dotted #a3a3a3;
            background-color: #fff;
            border-radius: 5px;
            position: relative;
            /* Tambahkan properti position */
            overflow: hidden;
            /* Tambahkan properti overflow */
        }

        .file-upload .square img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Tambahkan properti object-fit */
            position: absolute;
            /* Tambahkan properti position */
            top: 0;
            left: 0;
            cursor: pointer;
        }

        .btn-success-soft {
            color: #28a745;
            background-color: rgba(40, 167, 69, 0.1);
        }

        .btn-danger-soft {
            color: #dc3545;
            background-color: rgba(220, 53, 69, 0.1);
        }

        .autocomplete {
            /*the container must be positioned relative:*/
            position: relative;
            display: inline-block;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        .autocomplete-items div:hover {
            /*when hovering an item:*/
            background-color: #e9e9e9;
        }

        .autocomplete-active {
            /*when navigating through the items using the arrow keys:*/
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
    </style>
@endsection
{{-- @dd(auth()->user()->profile->nama_d) --}}

@section('nama')
    {{ $profile->nama_d }}

@endsection
@section('content')
    {{-- @dd($profile->nama_d) --}}
    <header class="prodihead" id="header">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <div id="alertContainer" class="alert alert-success fade-in" style="display: none;">
        <strong>Success!</strong> Profil berhasil diperbarui.
    </div>
    <div class="">
        <div class="row">
            <div class="col-12">
                <!-- Form START -->
                <form class="file-upload" method="post" action="{{ route('profile.update', $profile->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-md-center gx-5">
                        <!-- Upload foto profile -->
                        <div class="col-md-3">
                            <div class="bg-secondary-soft pt-5 pb-2 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0 text-center">Pilih Foto Profile</h4>
                                    <div class="text-center">
                                        <div id="imageContainer" class="square position-relative display-2 mb-3">
                                            <img disabled id="previewImg"
                                                src="{{ asset('storage/profiles/' . $profile->profile_pict) }}"
                                                alt="Profile Pict">
                                        </div>
                                        <input disabled type="file" id="customFile" name="profile_pict" accept="image/*"
                                            onchange="validateAndPreview(event)" hidden>
                                        <label disabled id="pilihBtn" class="mx-1 btn btn-success-soft"
                                            for="customFile">Pilih</label>
                                        <button disabled type="button" id="removeBtn"
                                            class="mx-1 btn btn-danger-soft">Hapus</button>
                                        <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>.jpg/jpeg/png
                                            dengan maksimal 500KB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Diri -->
                        <div class="col-xxl-7">
                            <div class="bg-secondary-soft px-2 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Data Diri</h4>
                                    {{-- NIK --}}
                                    <div class="col-md-6">
                                        <label class="form-label">NIK</label>
                                        <input disabled type="text" class="form-control" name="nik"
                                            placeholder="Nomor Induk KTP" aria-label="nik" value="{{ $profile->nik }}"
                                            required>
                                    </div>
                                    {{-- nkk --}}
                                    <div class="col-md-6">
                                        <label class="form-label">No. KK</label>
                                        <input disabled type="text" class="form-control" name="nkk"
                                            placeholder="Nomor Kartu Keluarga" aria-label="nkk" value="{{ $profile->nkk }}">
                                    </div>
                                    {{-- nama depan --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Depan</label>
                                        <input disabled type="text" class="form-control" name="nama_d"
                                            placeholder="Susi" aria-label="nama depan" value="{{ $profile->nama_d }}"
                                            required>
                                    </div>
                                    {{-- Nama Belakang --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Belakang</label>
                                        <input disabled type="text" class="form-control" name="nama_b"
                                            placeholder="Pujiastuti" aria-label="Nama Belakang"
                                            value="{{ $profile->nama_b }}">
                                    </div>
                                    {{-- Tempat Lahir --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input disabled type="text" class="form-control" name="tempat_lahir"
                                            placeholder="Karawang" aria-label="Tempat Lahir"
                                            value="{{ $profile->tempat_lahir }}" required>
                                    </div>
                                    {{-- Tgl Lahir --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Tgl. Lahir</label>
                                        <input disabled type="date" class="form-control" name="tgl_lahir"
                                            aria-label="Tgl. Lahir" value="{{ $profile->tgl_lahir }}" required>
                                    </div>
                                    {{-- jk --}}
                                    <div class="col-md-6">
                                        <label for="jk" class="form-label">Jenis Kelamin</label>
                                        <select disabled class="form-select" name="jk" required>
                                            <option value="laki-laki" {{ $profile->jk == 'laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="perempuan" {{ $profile->jk == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    {{-- agama --}}
                                    <div class="col-md-6">
                                        <label for="agama" class="form-label">Agama</label>
                                        <select disabled class="form-select" name="agama" value="" required>
                                            <option value="Islam" {{ $profile->agama == 'Islam' ? 'selected' : '' }}>
                                                Islam
                                            </option>
                                            <option value="Kristen" {{ $profile->agama == 'Kristen' ? 'selected' : '' }}>
                                                Kristen</option>
                                            <option value="Hindu" {{ $profile->agama == 'Hindu' ? 'selected' : '' }}>
                                                Hindu
                                            </option>
                                            <option value="Budha" {{ $profile->agama == 'Budha' ? 'selected' : '' }}>
                                                Budha
                                            </option>
                                            <option value="Konghucu"
                                                {{ $profile->agama == 'Konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                        </select>
                                    </div>
                                    {{-- No. Telepon --}}
                                    <div class="col-md-6">
                                        <label class="form-label">No. Telepon</label>
                                        <input disabled type="tel" class="form-control" name="no_hp"
                                            placeholder="085xxxxxxxx" aria-label="No. Telepon"
                                            value="{{ $profile->no_hp }}" required>
                                    </div>
                                    {{-- No. Telepon 2 --}}
                                    <div class="col-md-6">
                                        <label class="form-label">No. Telepon 2</label>
                                        <input disabled type="tel" class="form-control" name="no_hp2"
                                            placeholder="Opsional" aria-label="No. Telepon 2"
                                            value="{{ $profile->no_hp2 }}">
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="row g-3 mt-3">
                                    <h4 class="mb-2">Alamat Domisili</h4>
                                    {{-- provinsi --}}
                                    <div class="col-md-6">
                                        <label for="provinsi" class="form-label">Provinsi</label>
                                        <input disabled type="text" class="form-control" name="provinsi"
                                            placeholder="Provinsi" aria-label="provinsi"
                                            value="{{ $profile->provinsi }}" required>
                                    </div>
                                    {{-- kota --}}
                                    <div class="col-md-6">
                                        <label for="kota" class="form-label">Kota/Kabupaten</label>
                                        <input disabled type="text" class="form-control" name="kota"
                                            placeholder="Kota/Kab" aria-label="kota" value="{{ $profile->kota }}"
                                            required>
                                    </div>
                                    {{-- kecamatan --}}
                                    <div class="col-md-6">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <input disabled type="text" class="form-control" name="kecamatan"
                                            placeholder="Kecamatan" aria-label="kecamatan"
                                            value="{{ $profile->kecamatan }}" required>
                                    </div>
                                    {{-- desa --}}
                                    <div class="col-md-6">
                                        <label for="desa" class="form-label">Desa/Kelurahan</label>
                                        <input disabled type="text" class="form-control" name="desa"
                                            placeholder="Desa/Kelurahan" aria-label="desa" value="{{ $profile->desa }}"
                                            required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea disabled class="form-control" rows="5" id="alamat" name="alamat"
                                            placeholder="Jl. XYZ No. X RT XX/RW YY" aria-label="alamat" required>{{ $profile->alamat }}</textarea>
                                    </div>
                                </div>
                                {{-- Data Sekolah --}}
                                <div class="row g-3 mt-3">
                                    <h4 class="">Data Sekolah</h4>
                                    {{-- asal sekolah --}}
                                    <label for="pend_terakhir" class="form-label">Pendidikan Terakhir</label>
                                    <input disabled type="text" class="form-control" name="pend_terakhir"
                                        placeholder="SMA Negeri 1 Karawang" aria-label="pend_terakhir"
                                        value="{{ $profile->pend_terakhir }}" required>
                                    <div class="col-md-6">
                                        <label for="no_ijazah" class="form-label">No. Ijazah</label>
                                        <input disabled type="text" class="form-control" name="no_ijazah"
                                            placeholder="No. Ijazah" aria-label="no_ijazah"
                                            value="{{ $profile->no_ijazah }}" required>
                                    </div>
                                    {{-- Tahun Lulus --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Tahun Lulus</label>
                                        <select disabled class="form-select" name="tahun_lulus" value="" required>
                                            @php
                                                $tahunSekarang = date('Y');
                                                $tahunAwal = 1900;
                                            @endphp
                                            @for ($tahun = $tahunSekarang; $tahun >= $tahunAwal; $tahun--)
                                                <option value="{{ $tahun }}"
                                                    {{ $profile->tahun_lulus == $tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->
                    <!-- button -->
                    <div class="row justify-content-center">
                        <div class="col-xxl-11">
                            <div class="gap-3 p-5 d-md-flex justify-content-md-end text-center">
                                <!-- Tombol Simpan -->
                                <button type="submit" id="btnSubmit" class="btn btn-primary btn-lg"
                                    style="display: none;">Simpan</button>
                                <!-- Tombol Edit -->
                                <button type="button" id="btnEdit" class="btn btn-warning btn-lg">Edit</button>

                            </div>
                        </div>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>


    {{-- floating button --}}
    <a href="register#header" class="floating-btn" id="floatingBtn"></a>

@endsection
@section('scripts')
    {{-- <script>
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
                    previewImg.src ='/storage/profiles/{{ $profile->profile_pict }}'; // Tampilkan gambar default
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
            previewImg.src ='/storage/profiles/{{ $profile->profile_pict }}'; // Tampilkan gambar default
            var customFileInput = document.getElementById('customFile');
            customFileInput.value = ''; // Reset input file
        }

        // Event listener untuk tombol Remove
        var removeBtn = document.getElementById('removeBtn');
        removeBtn.addEventListener('click', removeImage);

        document.addEventListener("DOMContentLoaded", function() {
            var btnEdit = document.getElementById("btnEdit");
            var btnSubmit = document.getElementById("btnSubmit");

            // Fungsi untuk mengaktifkan mode Edit
            function enableEditMode() {
                btnEdit.innerText = "Batal";
                btnSubmit.style.display = "block";

                // Aktifkan semua input
                var inputs = document.querySelectorAll("input, select, textarea");
                inputs.forEach(function(input) {
                    input.removeAttribute("disabled");
                });
            }

            // Fungsi untuk menonaktifkan mode Edit
            function disableEditMode() {
                btnEdit.innerText = "Edit";
                btnSubmit.style.display = "none";

                // Nonaktifkan semua input
                var inputs = document.querySelectorAll("input, select, textarea");
                inputs.forEach(function(input) {
                    input.setAttribute("disabled", true);
                });
            }

            // Event listener untuk tombol Edit
            btnEdit.addEventListener("click", function() {
                if (btnEdit.innerText === "Edit") {
                    enableEditMode();
                } else {
                    disableEditMode();
                }
            });

            // Default: mode Edit dinonaktifkan saat halaman dimuat
            disableEditMode();
        });
    </script> --}}
    {{-- <script>
        // Fungsi untuk validasi dan preview gambar
        document.getElementById('imageContainer').addEventListener('click', function() {
            document.getElementById('customFile').click();
        });

        function validateAndPreview(event) {
            if (!isEditMode) {
                var selectedFile = event.target.files[0];
                var previewImg = document.getElementById('previewImg');

                if (selectedFile) {
                    // Validasi ukuran file
                    if (selectedFile.size > 500 * 1024) {
                        alert('Ukuran gambar melebihi batas maksimum (500KB).');
                        document.getElementById('customFile').value = ''; // Reset input file
                        previewImg.src ='/storage/profiles/{{ $profile->profile_pict }}'; // Tampilkan gambar default
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
        }

        function removeImage() {
            if (!isEditMode) {
                var previewImg = document.getElementById('previewImg');
                previewImg.src ='/storage/profiles/{{ $profile->profile_pict }}'; // Tampilkan gambar default
                var customFileInput = document.getElementById('customFile');
                customFileInput.value = ''; // Reset input file
            }
        }

        // Variabel untuk menyimpan status mode Edit
        var isEditMode = false;

        document.addEventListener("DOMContentLoaded", function() {
            var btnEdit = document.getElementById("btnEdit");
            var btnSubmit = document.getElementById("btnSubmit");

            // Fungsi untuk mengaktifkan mode Edit
            function enableEditMode() {
                isEditMode = true;
                btnEdit.innerText = "Batal";
                btnSubmit.style.display = "block";

                // Aktifkan semua input
                var inputs = document.querySelectorAll("input, select, textarea");
                inputs.forEach(function(input) {
                    input.removeAttribute("disabled");
                });
            }

            // Fungsi untuk menonaktifkan mode Edit
            function disableEditMode() {
                isEditMode = false;
                btnEdit.innerText = "Edit";
                btnSubmit.style.display = "none";

                // Nonaktifkan semua input
                var inputs = document.querySelectorAll("input, select, textarea");
                inputs.forEach(function(input) {
                    input.setAttribute("disabled", true);
                });

                // Reset validasi gambar dan hapus gambar jika ada
                document.getElementById('customFile').value = ''; // Reset input file
                var previewImg = document.getElementById('previewImg');
                previewImg.src ='/storage/profiles/{{ $profile->profile_pict }}'; // Tampilkan gambar default
            }

            // Event listener untuk tombol Edit
            btnEdit.addEventListener("click", function(event) {
                event.preventDefault(); // Mencegah refresh halaman
                if (!isEditMode) {
                    enableEditMode();
                } else {
                    disableEditMode();
                }
            });

            // Default: mode Edit dinonaktifkan saat halaman dimuat
            disableEditMode();
        });
    </script> --}}

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
                    previewImg.src = '/storage/profiles/{{ $profile->profile_pict }}'; // Tampilkan gambar default
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

        // fungsi remove button
        function removeImage() {
            var previewImg = document.getElementById('previewImg');
            previewImg.src = 'storage/profiles/default-profile-icon.png'; // Tampilkan gambar default
            var customFileInput = document.getElementById('customFile');
            customFileInput.value = ''; // Reset input file
        }

        // Event listener untuk tombol Remove
        var removeBtn = document.getElementById('removeBtn');
        removeBtn.addEventListener('click', removeImage);


        // Variabel untuk menyimpan status mode Edit
        var isEditMode = false;

        document.addEventListener("DOMContentLoaded", function() {
            var btnEdit = document.getElementById("btnEdit");
            var btnSubmit = document.getElementById("btnSubmit");
            var removeBtn = document.getElementById("removeBtn");
            var pilihBtn = document.getElementById("pilihBtn");

            // Fungsi untuk mengaktifkan mode Edit
            function enableEditMode() {
                isEditMode = true;
                btnEdit.innerText = "Batal";
                btnSubmit.style.display = "block";
                removeBtn.removeAttribute("disabled")
                pilihBtn.removeAttribute("disabled")

                // Aktifkan semua input
                var inputs = document.querySelectorAll("input, select, textarea");
                inputs.forEach(function(input) {
                    input.removeAttribute("disabled");
                });
            }

            // Fungsi untuk menonaktifkan mode Edit
            function disableEditMode() {
                isEditMode = false;
                btnEdit.innerText = "Edit";
                btnSubmit.style.display = "none";
                removeBtn.setAttribute("disabled", true);
                pilihBtn.setAttribute("disabled", true);

                // Nonaktifkan semua input
                var inputs = document.querySelectorAll("input, select, textarea");
                inputs.forEach(function(input) {
                    input.setAttribute("disabled", true);
                });

                // Reset validasi gambar dan hapus gambar jika ada
                document.getElementById('customFile').value = ''; // Reset input file
                var previewImg = document.getElementById('previewImg');
                previewImg.src =
                    '/storage/profiles/{{ $profile->profile_pict }}'; // Tampilkan gambar default
            }

            // Event listener untuk tombol Edit
            btnEdit.addEventListener("click", function(event) {
                event.preventDefault(); // Mencegah refresh halaman
                if (!isEditMode) {
                    enableEditMode();
                } else {
                    disableEditMode();
                }
            });

            // Default: mode Edit dinonaktifkan saat halaman dimuat
            disableEditMode();

            // alert 
            var alertContainer = document.getElementById('alertContainer');
            var successMessage = "{{ session('success') }}";

            if (successMessage) {
                alertContainer.style.display = 'block';
                setTimeout(function() {
                    alertContainer.style.display = 'none';
                }, 3000); // Menghilangkan alert setelah 3 detik (3000 milidetik)
            }
        });
    </script>

@endsection
