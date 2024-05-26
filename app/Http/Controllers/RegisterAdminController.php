<?php

namespace App\Http\Controllers;

use App\DataTables\HomeAdminDataTable;
use App\DataTables\RegisterDataTable;
use App\DataTables\UnconfirmedDataTable;
use App\DataTables\UnuploadedDataTable;
use App\DataTables\WaitingVerifDataTable;
use App\Models\Profile;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    public function index(RegisterDataTable  $registerDataTable)
    {
        $profiles = Profile::with(['registrations', 'registrations.prodie'])->get();


        return $registerDataTable->render('admin.all-register', [
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
