<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test-Card</title>
</head>

<body>
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
                                <strong class="badge text-bg-secondary">{{ $prodi->prodi }}</strong>
                            </span>
                            <span>
                                <strong class="badge text-bg-secondary mx-1">{{ $registration->jalur }}</strong>
                            </span>
                        </div>
                        <span>Status:
                            @if ($registration->is_verif == false)
                                <strong class="badge text-bg-danger">Belum Konfirmasi</strong>
                            @elseif($registration->is_verif == true && $registration->appendix_id == null)
                                <strong class="badge text-bg-warning">Menunggu Pembayaran</strong>
                        </span>
                        <span class="list-group-item">Total pembayaran: <strong class="badge text-bg-success">Rp.
                                {{ number_format($registration->reg_fee, 0, ',', '.') }}</strong>
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
                    <form action="{{ route('home.verif', $registration->id) }}" method="post">
                        @csrf
                        <input type="text" name="is_verif" id="is_verif" value="1" hidden>
                        <button type="submit" class="btn btn-primary px-1 mx-1">Konfirmasi
                            Daftar</button>
                    </form>
                    <button class="btn btn-light px-1 mx-1" data-bs-toggle="modal" data-bs-target="#modalJurusan">Ubah
                        Jurusan/Jalur</button>
                @elseif($registration->is_verif == true && $registration->appendix_id == null)
                    <a href="" class="btn btn-primary px-1 mx-1" data-bs-toggle="modal"
                        data-bs-target="#modalBuktiPembayaran">Upload bukti
                        pembayaran</a>
                @elseif($registration->is_set == true)
                    <a href="#" class="btn btn-success px-1 mx-1">Gabung Grup WhatsApp</a>
                    <a href="#" class="btn btn-danger px-1 mx-1">Cetak Kartu Test</a>
                @endif

            </div>
        </div>
    </div>

</body>

</html>
