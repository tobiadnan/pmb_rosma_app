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

        // set reg_fee
        $prodi = $request->prodi;
        $jalur = $request->jalur;
        $ranking = $jalur == 'Prestaka' ? $request->ranking : "";

        $prodiCode = substr($prodi, -2);

        if ($prodiCode == 'S1') {
            if ($jalur == 'Reguler') {
                $reg_fee = 2000000;
            } elseif ($jalur == 'Yaperos') {
                $reg_fee = 2000000 * 0.75;
            } elseif ($jalur == 'Prestaka') {
                if ($ranking == 'A') {
                    $reg_fee = 0;
                } elseif ($ranking == 'B') {
                    $reg_fee = 2000000 * 0.75;
                } else {
                    $reg_fee = 2000000 * 0.5;
                }
            } else {
                $reg_fee = 0;
            }
        } elseif ($prodiCode == 'D3') {
            if ($jalur == 'Reguler') {
                $reg_fee = 1500000;
            } elseif ($jalur == 'Yaperos') {
                $reg_fee = 1500000 * 0.75;
            } elseif ($jalur == 'Prestaka') {
                if ($ranking == 'A') {
                    $reg_fee = 0;
                } elseif ($ranking == 'B') {
                    $reg_fee = 1500000 * 0.75;
                } else {
                    $reg_fee = 1500000 * 0.5;
                }
            } else {
                $reg_fee = 0;
            }
        }

        // save to users
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => "0"
        ]);
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
        // save to registrations
        $registration = Registration::create([
            'kode_prodi' => $prodi,
            'jalur' => $jalur,
            'ranking' => $ranking,
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
            return redirect()->route('admin.home');
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
