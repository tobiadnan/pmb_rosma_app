<?php

namespace App\Http\Controllers;

use App\DataTables\HomeAdminDataTable;
use App\DataTables\RegisterDataTable;
use App\DataTables\UnconfirmedDataTable;
use App\DataTables\UnuploadedDataTable;
use App\DataTables\WaitingVerifDataTable;
use App\Jobs\SendTestInfoMail;
use App\Mail\TestInfoMail;
use App\Models\Profile;
use App\Models\Registration;
use App\Models\Test;
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
        SendTestInfoMail::dispatch($profile, $prodi, $registration, $no_test);

        // Redirect atau tampilkan respons sesuai kebutuhan
        return redirect()->route('admin.waiting_verif')->with([
            'success' => 'Anda telah menyelesaikan pendaftaran. Sekarang ikuti arahan selanjutnya..',
        ]);
    }

    public function unconfirmed(UnconfirmedDataTable  $unconfirmedDataTable)
    {
        $profiles = Profile::with(['registrations', 'registrations.prodie'])->get();

        return $unconfirmedDataTable->render('admin.unconfirmed', [
            'profiles' => $profiles,
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
