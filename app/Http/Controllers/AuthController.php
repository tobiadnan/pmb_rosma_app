<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        // Validate the request...
        Validator::make(request()->all(), [
            'nama' => 'required',
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
            'tahun_lulus' => 'required|digits:4'
        ])->validate();

        // save to users
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => "0"
        ]);

        // dd($user);

        // save to profiles
        // Enkripsi NIK dan NKK
        $encryptedNIK = Hash::make($request->nik);
        $encryptedNKK = Hash::make($request->nkk);

        $profileData = [
            'nama' => $request->nama,
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
            'user_id' => $user->id,
            'nik' => $encryptedNIK,
            'nkk' => $encryptedNKK,
        ];

        Profile::create($profileData);

        return redirect()->route('login')->withSuccess("Register Successfully!");
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
            # code...
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('home');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
