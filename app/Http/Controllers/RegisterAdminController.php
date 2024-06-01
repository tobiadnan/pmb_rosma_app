<?php

namespace App\Http\Controllers;


use App\DataTables\RegisterDataTable;
use App\DataTables\UnconfirmedDataTable;
use App\DataTables\UnuploadedDataTable;
use App\DataTables\WaitingVerifDataTable;
use App\Jobs\SendKonfirmasiMail;
use App\Jobs\SendTestInfoMail;
use App\Models\Prodie;
use App\Models\Profile;
use App\Models\Registration;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    public function verified(RegisterDataTable  $registerDataTable)
    {
        $profiles = Profile::with(['registrations', 'registrations.prodie'])->get();


        return $registerDataTable->render('admin.verified', [
            'profiles' => $profiles,
        ]);
    }

    public function waitingVerif(WaitingVerifDataTable  $waitingVerifDataTable)
    {
        $profiles = Profile::with(['registrations', 'registrations.prodie'])->get();

        return $waitingVerifDataTable->render('admin.waitingVerif', [
            'profiles' => $profiles,
        ]);
    }


    public function waitingVerif_verif(Request $request)
    {
        $registration = Registration::find($request->idReg);
        $profile = Profile::find($request->idReg);
        $user = User::find($profile->user_id);

        if ($registration) {
            $prodi = $registration->prodie;
        }

        // update is_set
        $registration->update([
            'is_set' => true,
        ]);

        if ($registration->is_set) {
            $no_test = 'PMB-TEST/' . date('Y') . '/' . $registration->id;
        } else {
            $no_test = '-';
        }

        // save to Test
        $test = Test::create([
            'no_test' => $no_test,
            'registration_id' => $request->idReg,
        ]);

        // Dispatch job dengan melewatkan data
        SendTestInfoMail::dispatch($profile, $prodi, $registration, $no_test, $user);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('admin.waiting_verif')->with([
            'success' => 'Data Telah Terkonfirmasi..',
        ]);
    }

    public function unconfirmed(UnconfirmedDataTable  $unconfirmedDataTable)
    {
        $profiles = Profile::with(['registrations', 'registrations.prodie'])->get();

        return $unconfirmedDataTable->render('admin.unconfirmed', [
            'profiles' => $profiles,
        ]);
    }

    public function unconfirmed_confirm(Request $request)
    {
        $registration = Registration::find($request->idReg);
        $profile = Profile::find($request->idReg);
        $user = User::find($profile->user_id);

        if ($registration) {
            $prodi = $registration->prodie;
        }

        // Dispatch job dengan melewatkan data
        SendKonfirmasiMail::dispatch($profile, $prodi, $registration, $user);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('admin.unconfirmed')->with([
            'success' => 'Email Konfirmasi Terkirim',
        ]);
    }

    public function unuploaded(UnuploadedDataTable  $unuploadedDataTable)
    {
        $profiles = Profile::with(['registrations', 'registrations.prodie'])->get();

        return $unuploadedDataTable->render('admin.unuploaded', [
            'profiles' => $profiles,
        ]);
    }
}
