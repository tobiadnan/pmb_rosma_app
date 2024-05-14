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

        $ranking = ($jalur != 'Prestaka') ? null : $request->ranking;

        $prodiCode = substr($kode_prodi, -2);
        $reg_fee_s1reg = 2000000;
        $reg_fee_d3reg = 1500000;

        if ($prodiCode == 'S1') {
            if ($jalur == 'Reguler') {
                $reg_fee = $reg_fee_s1reg;
            } elseif ($jalur == 'Yaperos') {
                $reg_fee = $reg_fee_s1reg * 0.75;
            } elseif ($jalur == 'Prestaka') {
                if ($ranking == 'A') {
                    $reg_fee = 0;
                } elseif ($ranking == 'B') {
                    $reg_fee = $reg_fee_s1reg * 0.75;
                } else {
                    $reg_fee = $reg_fee_s1reg * 0.5;
                }
            } else {
                $reg_fee = 0;
            }
        } elseif ($prodiCode == 'D3') {
            if ($jalur == 'Reguler') {
                $reg_fee = $reg_fee_d3reg;
            } elseif ($jalur == 'Yaperos') {
                $reg_fee = $reg_fee_d3reg * 0.75;
            } elseif ($jalur == 'Prestaka') {
                if ($ranking == 'A') {
                    $reg_fee = 0;
                } elseif ($ranking == 'B') {
                    $reg_fee = $reg_fee_d3reg * 0.75;
                } else {
                    $reg_fee = $reg_fee_d3reg * 0.5;
                }
            } else {
                $reg_fee = 0;
            }
        }

        // dd($reg_fee);
        // Lakukan update data
        $registration->update([
            'kode_prodi' => $kode_prodi,
            'jalur' => $jalur,
            'ranking' => $ranking,
            'reg_fee' => $reg_fee,
        ]);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('home')->with('success', 'Jurusan dan atau Jalur berhasil diperbarui. Silahkan Selesaikan pendaftaran !!');
    }

    public function verif(Request $request, $id)
    {
        $registration = Registration::find($id);
        $profile = $request->user()->profile;


        if ($registration) {
            $prodi = $registration->prodie;
        }

        // update is_verif
        $registration->update([
            'is_verif' => $request->is_verif,
        ]);

        if ($registration->is_verif) {
            $no_reg = 'PMBRSM/' . date('Y') . '/' . $registration->id;
        } else {
            $no_reg = '-';
        }

        // Dispatch job dengan melewatkan data
        SendPaymentInfoMail::dispatch($profile, $prodi, $registration, $no_reg);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('home')->with([
            'success' => 'Anda telah menyelesaikan pendaftaran. Sekarang ikuti arahan selanjutnya..',
        ]);
    }
}
