<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test-Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            padding: 0;
            margin: 0;
        }

        .content {
            padding: 20px;
            /* Pastikan padding-bottom lebih besar dari tinggi footer */
            padding-bottom: 60px;
        }

        table {
            width: 100%;
            /* Lebar tabel 100% dari kontainer */
            table-layout: fixed;
            /* Mengatur lebar kolom secara merata */
        }

        .card-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px dotted #989898;
        }

        .card-table th,
        .card-table td {
            padding: 7px;
            border-bottom: 1px solid #ddd;
        }

        .center {
            text-align: center;
        }

        .title {
            color: black;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1px
        }

        .subtitle {
            color: #9e9b9b;
            font-size: 1.5rem;
            margin-top: 1px
        }

        .footer {
            position: fixed;
            color: grey;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f0f0f000;
            padding: 10px 20px;
            text-align: center;
            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="content">

        <div class="center">
            <img src="{{ public_path('storage/logo.png') }}" alt="STMIK Logo" style="max-width: 100px;">
            <p class="title">Kartu Test PMB {{ date('Y') }}/{{ date('Y') + 1 }}</p>
            <p class="subtitle">{{ $no_reg }}</p>

        </div>
        <table class="card-table" style="margin: 0 auto;">
            <tr>
                <td style="text-align: right;">Nama Lengkap</td>
                <td><strong>{{ $profile->nama_d }} {{ $profile->nama_b }} </strong></td>
            </tr>
            <tr>
                <td style="text-align: right;">Program Studi</td>
                <td><strong>{{ $prodi->prodi }} </strong></td>
            </tr>
            <tr>
                <td style="text-align: right;">No. Test</td>
                <td><strong>TEST123456 </strong></td>
            </tr>
            <tr>
                <td style="text-align: right;">Waktu Test</td>
                <td><strong>09:00 WIB | 12 Desember 2024 </strong></td>
            </tr>
            <tr>
                <td style="text-align: right;">Tempat Pelaksanaan Test</td>
                <td><strong>Aula Kampus Utama STMIK Rosma </strong></td>
            </tr>
            <!-- Sisipkan baris-baris data lainnya di sini -->
        </table>

        <p style="text-align: justify;">
            Selamat! Pendaftaran kamu telah berhasil diverifikasi. Kamu telah terdaftar untuk mengikuti tes dengan
            nomor tes <strong>{ Nomor Test }</strong>. Kami harap kamu dapat mencetak kartu tes sebagai bukti
            pendaftaran kamu dan untuk akses ke tes yang akan datang. Terima kasih atas partisipasi kamu!

            Seluruh informasi test akan diberikan pada grup WhatsApp yang telah kami kirimkan, atau jika kamu belum
            menerima undangan Grup, kamu bisa menghubungi contact center panitia PMB.
        </p>
    </div>
    <div class="footer">
        PMB STMIK Rosma Karawang | 0857-7777-7777 | pmb@rosma.ac.id <span class="pagenum"></span>
    </div>

</body>

</html>
