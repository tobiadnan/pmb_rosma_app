<?php

namespace App\Http\Controllers;

use App\Models\Prodie;
use App\Models\Profile;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register()
    {
        $prodies = Prodie::pluck('prodi', 'kode_prodi');

        return view('auth.register', compact('prodies'));
    }

    public function registerSave(Request $request)
    {
        // Validate the request...
        Validator::make(request()->all(), [
            'nama_d' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'no_hp' => 'required|digits_between:11,15', // Ubah menjadi 'required' jika no_hp wajib diisi
            'no_hp2' => 'nullable|digits_between:11,15', // Ubah menjadi 'required' jika no_hp2 wajib diisi
            'alamat' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'pend_terakhir' => 'required',
            'no_ijazah' => 'required',
            'prodi' => 'required',
            'jalur' => 'required',
            'tahun_akademik' => 'required',
            'tahun_lulus' => 'required|digits:4',
            'profile_pict' => 'image|mimes:jpeg,png,jpg,gif|max:500'
        ])->validate();

        // save to users
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => "0"
        ]);

        // Mendapatkan file gambar dari request
        if ($request->hasFile('profile_pict')) {
            $image = $request->file('profile_pict');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Periksa apakah file dengan nama yang sama sudah ada
            if (!Storage::disk('public')->exists('profiles/' . $imageName)) {
                // Simpan gambar ke direktori penyimpanan (contoh: storage/app/public/profiles)
                $image->storeAs('public/profiles', $imageName);
            }
        } else {
            $imageName = "default-profile-icon.png";
        }

        // save to profiles
        $profile = Profile::create([
            'nama_d' => $request->nama_d,
            'nama_b' => $request->nama_b,
            'nik' => $request->nik,
            'nkk' => $request->nkk,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'no_hp' => $request->no_hp,
            'no_hp2' => $request->no_hp2,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'pend_terakhir' => $request->pend_terakhir,
            'no_ijazah' => $request->no_ijazah,
            'tahun_lulus' => $request->tahun_lulus,
            'profile_pict' => $imageName,
            'user_id' => $user->id,
        ]);

        // set reg_fee
        $prodi = $request->prodi;
        $jalur = $request->jalur;

        $prodiCode = substr($prodi, -2);

        if (in_array($prodiCode, ['S1'])) {
            $reg_fee = ($jalur == 'Prestaka') ? 500000 : 1000000;
        } elseif (in_array($prodiCode, ['D3'])) {
            $reg_fee = ($jalur == 'Reguler') ? 750000 : 250000;
        } else {
            $reg_fee = 250000; // Default jika program studi tidak terdefinisi
        }




        // save to registrations
        $registration = Registration::create([
            'kode_prodi' => $prodi,
            'jalur' => $jalur,
            'tahun_akademik' => $request->tahun_akademik,
            'reg_fee' => $reg_fee,
            'profile_id' => $profile->id,

        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only("email", "password"), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        // dd(auth()->user()->is_admin);
        if (auth()->user()->is_admin) {
            return redirect()->route('admin/home');
        } else {
            $profile = Profile::where('user_id', auth()->id())->first();
            // dd($profile->nama_d);
            return
                redirect()->route('home')->with([
                    'profile' => $profile,
                ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
