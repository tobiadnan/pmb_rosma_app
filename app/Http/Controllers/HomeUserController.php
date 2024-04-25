<?php

namespace App\Http\Controllers;

use App\Models\Prodie;
use App\Models\Profile;
use App\Models\Registration;
use Illuminate\Http\Request;

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

        return view('user.home', [
            'profile' => $profile,
            'prodi' => $prodi,
            'registration' => $registration,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Cari profil yang akan diupdate
        // Update data dalam database
        $registration = Registration::find($id);
        // dd($registration->prodi);
        // Lakukan update data
        $registration->update([
            'kode_prodi' => $request->kode_prodi,
            'jalur' => $request->jalur,
        ]);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('home')->with('success', 'Jurusan dan Jalur berhasil diperbarui.');
    }
}
