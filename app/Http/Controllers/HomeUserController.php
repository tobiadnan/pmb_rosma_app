<?php

namespace App\Http\Controllers;

use App\Jobs\SendPaymentInfoMail;
use App\Models\Registration;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index(Request $request)
    {

        $profile = $request->user()->profile;
        $registration = $profile->registrations()->first();

        if ($registration) {
            $prodi = $registration->prodie()->first();
        }

        if ($registration->is_verif) {
            $no_reg = 'PMBRSM/' . date('Y') . '/' . $registration->id;
        } else {
            $no_reg = '-';
        }

        // dd($no_reg);
        return view('user.home', [
            'profile' => $profile,
            'prodi' => $prodi,
            'registration' => $registration,
            'no_reg' => $no_reg,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Cari profil yang akan diupdate
        // Update data dalam database
        $registration = Registration::find($id);
        // set reg_fee
        $kode_prodi = $request->kode_prodi;
        $jalur = $request->jalur;

        $prodiCode = substr($kode_prodi, -2);

        if (in_array($prodiCode, ['S1'])) {
            $reg_fee = ($jalur == 'Prestaka') ? 500000 : 1000000;
        } elseif (in_array($prodiCode, ['D3'])) {
            $reg_fee = ($jalur == 'Reguler') ? 750000 : 250000;
        } else {
            $reg_fee = 250000; // Default jika program studi tidak terdefinisi
        }
        // Lakukan update data
        $registration->update([
            'kode_prodi' => $kode_prodi,
            'jalur' => $jalur,
            'reg_fee' => $reg_fee,
        ]);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('home')->with('success', 'Jurusan dan atau Jalur berhasil diperbarui. Silahkan Selesaikan pendaftaran !!');
    }

    public function verif(Request $request, $id)
    {
        $registration = Registration::find($id);
        $profile = $request->user()->profile;

        $registration->update([
            'is_verif' => $request->is_verif,
        ]);

        if ($registration->is_verif) {
            $no_reg = 'PMBRSM/' . date('Y') . '/' . $registration->id;
        } else {
            $no_reg = '-';
        }

        if ($registration) {
            $prodi = $registration->prodie;
        }
        // Dispatch job dengan melewatkan data
        SendPaymentInfoMail::dispatch($profile, $prodi, $registration, $no_reg);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('home')->with([
            'success' => 'Anda telah menyelesaikan pendaftaran. Sekarang ikuti arahan selanjutnya..',
        ]);
    }
}
