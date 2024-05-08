<?php

namespace App\Http\Controllers;

use App\Models\Appendix;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppendixController extends Controller
{

    public function store(Request $request, $id)
    {
        Validator::make($request->all(), [
            'ktp' => 'file|mimes:jpeg,png,pdf|max:300',
            'kk' => 'required|file|mimes:jpeg,png,pdf|max:300',
            'ijazah' => 'required|file|mimes:jpeg,png,pdf|max:300',
            'transkip' => 'required|file|mimes:jpeg,png,pdf|max:300',
            'bukti_tf' => 'required|file|mimes:jpeg,png,pdf|max:300',
        ])->validate();

        // Simpan data
        $appendix = new Appendix();

        $appendix->ktp = $request->file('ktp')->hashName();
        $appendix->kk = $request->file('kk')->hashName();
        $appendix->ijazah = $request->file('ijazah')->hashName();
        $appendix->transkip = $request->file('transkip')->hashName();
        $appendix->bukti_tf = $request->file('bukti_tf')->hashName();

        $appendix->save();

        $registration = Registration::find($id);

        $registration->update([
            'appendix_id' => $appendix->id,
        ]);

        // Simpan file ke storage
        $request->file('ktp')->storeAs('appendix_files', $appendix->ktp);
        $request->file('kk')->storeAs('appendix_files', $appendix->kk);
        $request->file('ijazah')->storeAs('appendix_files', $appendix->ijazah);
        $request->file('transkip')->storeAs('appendix_files', $appendix->transkip);
        $request->file('bukti_tf')->storeAs('appendix_files', $appendix->bukti_tf);

        return redirect()->route('home')->with([
            'success' => 'Anda telah mengunggah dokumen dan bukti pembayaran. Sekarang ikuti arahan selanjutnya..',
        ]);
    }
}
