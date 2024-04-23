<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        // Ambil data user dari database
        $profile = Profile::where('id', $request->user()->id)->first();

        // Kirim data user ke view profile
        // dd($request->profile_pict);
        // if ($request->profile_pict == null) {
        //     $profile_pict = "default-profile-icon.png";
        // }else(
        //     $profile_pict = $request->profile_pict;
        // )

        // dd($imageName);
        return view('user.profile', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validatedData = $request->validate([
        //     'nama_d' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        //     'tempat_lahir' => 'required',
        //     'tgl_lahir' => 'required',
        //     'jk' => 'required',
        //     'agama' => 'required',
        //     'no_hp' => 'required|digits_between:11,15', // Ubah menjadi 'required' jika no_hp wajib diisi
        //     'no_hp2' => 'nullable|digits_between:11,15', // Ubah menjadi 'required' jika no_hp2 wajib diisi
        //     'alamat' => 'required',
        //     'desa' => 'required',
        //     'kecamatan' => 'required',
        //     'kota' => 'required',
        //     'provinsi' => 'required',
        //     'pend_terakhir' => 'required',
        //     'no_ijazah' => 'required',
        //     'tahun_lulus' => 'required|digits:4',
        //     'profile_pict' => 'image|mimes:jpeg,png,jpg,gif|max:500'
        // ]);


        // Cari profil yang akan diupdate
        // Update data dalam database
        $profile = Profile::find($id);
        // dd($profile);
        // $profile->update($validatedData);

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
        // Lakukan update data
        $profile->update([
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
        ]);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
