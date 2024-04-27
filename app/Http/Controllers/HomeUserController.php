<?php

namespace App\Http\Controllers;

use App\Mail\PaymentInfoMail;
use App\Models\Prodie;
use App\Models\Profile;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeUserController extends Controller
{
    public function index(Request $request)
    {
        $profile = Profile::where('id', $request->user()->id)->first();
        $registration = Registration::where('profile_id', $request->user()->id)->first();

        if ($registration) {
            $prodi = Prodie::join('registrations', 'prodies.kode_prodi', '=', 'registrations.kode_prodi')
                ->join('profiles', 'registrations.profile_id', '=', 'profiles.id')
                ->where('registrations.id', $registration->id)
                ->select('prodies.*')
                ->first();
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

        // Lakukan update data
        $registration->update([
            'kode_prodi' => $request->kode_prodi,
            'jalur' => $request->jalur,
        ]);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('home')->with('success', 'Jurusan dan atau Jalur berhasil diperbarui. Silahkan Selesaikan pendaftaran !!');
    }

    public function verif(Request $request, $id)
    {
        $registration = Registration::find($id);

        $registration->update([
            'is_verif' => $request->is_verif,
        ]);

        $paymentInfo = [
            'account_number' => '12345',
            'bank_name' => 'BNI',
            'amount' => '1jt',
            'transfer_instructions' => 'Tata cara transfernya...'
        ];

        $userData = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('registrations', 'profiles.id', '=', 'registrations.profile_id')
            ->select('users.email')
            ->where('registrations.id', $registration->id)
            ->first();
        // Kirim email
        Mail::to($userData->email)->send(new PaymentInfoMail($paymentInfo));

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('home')->with([
            'success' => 'Anda telah menyelesaikan pendaftaran. Sekarang ikuti arahan selanjutnya..',
            'paymentInfo' => $paymentInfo,
        ]);
    }
}
