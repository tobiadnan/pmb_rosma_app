@extends('template.template')

@section('title')
    Daftar
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
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
			position: relative; /* Tambahkan properti position */
			overflow: hidden; /* Tambahkan properti overflow */
		}
		
		.file-upload .square img {
			width: 100%;
			height: 100%;
			object-fit: cover; /* Tambahkan properti object-fit */
			position: absolute; /* Tambahkan properti position */
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
    </style>
@endsection
@section('content')
<header class="prodihead" id="header">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">Registrasi PMB Rosma</h1>
            </div>
        </div>
    </div>
</header>
<div class="container my-3">
	<div class="row">
		<div class="col-12">
			<!-- Form START -->
			<form class="file-upload mt-3">
				<div class="row justify-content-md-center gx-5">
					<!-- Upload profile -->
					<div class="col-xxl-3">
                        <div class="bg-secondary-soft px-2 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="mb-4 mt-0 text-center">Pilih Foto Profile</h4>
                                <div class="text-center">
                                    <div id="imageContainer" class="square position-relative display-2 mb-3">
                                        <img id="previewImg" src="/img/profile/default-profile-icon.png" alt="Preview Image">
                                    </div>
									<input type="file" id="customFile" name="file" accept="image/*" onchange="validateAndPreview(event)" hidden>
                                    <label class="btn btn-success-soft btn-block" for="customFile">Pilih</label>
                                    <button type="button" id="removeBtn" class="btn btn-danger-soft">Hapus</button>
                                    <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>.jpg/jpeg/png dengan maksimal 500KB</p>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- Data Diri -->
					<div class="col-xxl-7">
						<div class="bg-secondary-soft px-2 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Data Diri</h4>
                                {{-- nama depan --}}
								<div class="col-md-6">
									<label class="form-label">Nama Depan</label>
									<input type="text" class="form-control" placeholder="Susi" aria-label="nama depan" required>
								</div>
                                {{-- Nama Belakang --}}
								<div class="col-md-6">
									<label class="form-label">Nama Belakang</label>
									<input type="text" class="form-control" placeholder="Pujiastuti" aria-label="Nama Belakang">
								</div>
                                {{-- Tempat Lahir --}}
								<div class="col-md-6">
									<label class="form-label">Tempat Lahir</label>
									<input type="text" class="form-control" placeholder="Karawang" aria-label="Tempat Lahir" required>
								</div>
                                {{-- Tgl Lahir --}}
								<div class="col-md-6">
									<label class="form-label">Tgl. Lahir</label>
									<input type="date" class="form-control" aria-label="Tgl. Lahir" required>
								</div>
                                {{-- jk --}}
                                <div class="col-md-6">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" required>
                                        <option selected>Pilih...</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                {{-- agama --}}
                                <div class="col-md-6">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select class="form-select" required>
                                        <option selected>Pilih...</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
								{{-- No. Telepon --}}
								<div class="col-md-6">
									<label class="form-label">No. Telepon</label>
									<input type="tel" class="form-control" placeholder="085xxxxxxxx" aria-label="No. Telepon" required>
								</div>
								{{-- No. Telepon 2 --}}
								<div class="col-md-6">
									<label class="form-label">No. Telepon 2</label>
									<input type="tel" class="form-control" placeholder="Opsional" aria-label="No. Telepon 2">
								</div>
                                {{-- Asal Sekolah --}}
								{{-- <div class="col-md-6">
									<label class="form-label">Asal Sekolah</label>
									<input type="text" class="form-control" placeholder="SMA Negeri XYZ" aria-label="Asal Sekolah" required>
								</div> --}}
                                <div class="col-md-6">
                                    <label for="asalSekolah" class="form-label">Asal Sekolah</label>
                                    <select class="form-select" name="asalSekolah" id="asalSekolah" required>
                                        <option selected>Pilih...</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                {{-- Tahun Lulus --}}
								<div class="col-md-6">
									<label class="form-label">Tahun Lulus</label>
									<input type="text" class="form-control" placeholder="2024" aria-label="Tahun Lulus" required>
								</div>
                            </div> <!-- Row END -->
                        </div>
					</div>
				</div> <!-- Row END -->

				<!-- Alamat Domisili -->
				<div class="row justify-content-md-center gx-5">
					<!-- change password -->
					<div class="col-xxl-3">
						{{-- <div class="bg-secondary-soft px-2 py-5 rounded">
							<div class="row g-3">
								<h4 class="my-4">Change Password</h4>
								<!-- Old password -->
								<div class="col-md-6">
									<label for="exampleInputPassword1" class="form-label">Old password *</label>
									<input type="password" class="form-control" id="exampleInputPassword1">
								</div>
								<!-- New password -->
								<div class="col-md-6">
									<label for="exampleInputPassword2" class="form-label">New password *</label>
									<input type="password" class="form-control" id="exampleInputPassword2">
								</div>
								<!-- Confirm password -->
								<div class="col-md-12">
									<label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
									<input type="password" class="form-control" id="exampleInputPassword3">
								</div>
							</div>
						</div> --}}
					</div>
					<div class="col-xxl-7 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-2 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Alamat Domisili</h4>
								{{-- provinsi --}}
                                <div class="col-md-6">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <select class="form-select" name="provinsi" id="provinsi" required>
                                        <option selected>Pilih...</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
								{{-- kota --}}
                                <div class="col-md-6">
                                    <label for="kota" class="form-label">Kota/Kabupaten</label>
                                    <select class="form-select" name="kota" id="kota" required>
                                        <option selected>Pilih...</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
								{{-- kecamatan --}}
                                <div class="col-md-6">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-select" name="kecamatan" id="kecamatan" required>
                                        <option selected>Pilih...</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
								{{-- desa --}}
                                <div class="col-md-6">
                                    <label for="desa" class="form-label">Desa/Kelurahan</label>
                                    <select class="form-select" name="desa" id="desa" required>
                                        <option selected>Pilih...</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
								<div class="">
									<label for="alamat">Alamat:</label>
									<textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Jl. XYZ No. X RT XX/RW YY" required></textarea>
								</div>
							</div> <!-- Row END -->
						</div>
					</div>
				</div> <!-- Row END -->
				<!-- button -->
				<div class="row justify-content-center">
					<div class="col-xxl-11">
						<div class="gap-3 p-5 d-md-flex justify-content-md-end text-center">
							<button type="submit" class="btn btn-primary btn-lg">SIMPAN</button>
							{{-- <button type="button" class="btn btn-danger btn-lg">Delete profile</button> --}}
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
				previewImg.src = '/img/profile/default-profile-icon.png'; // Tampilkan gambar default
				return;
			}
			
			var reader = new FileReader();
			
			reader.onload = function (e) {
			var img = new Image();
			img.src = e.target.result;
	
			img.onload = function () {
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
	previewImg.src = '/img/profile/default-profile-icon.png'; // Tampilkan gambar default
	var customFileInput = document.getElementById('customFile');
	customFileInput.value = ''; // Reset input file
	}
	
	// Event listener untuk tombol Remove
	var removeBtn = document.getElementById('removeBtn');
	removeBtn.addEventListener('click', removeImage);
</script>
@endsection
