<?php

namespace App\Http\Controllers;

use App\DataTables\HomeAdminDataTable;
use App\DataTables\RegisterDataTable;
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
        // Registration::where('is_verif', true)
        // ->where('is_set', false)
        // ->whereNotNull('appendix_id')->get();

        return $waitingVerifDataTable->render('admin.waitingVerif', [
            'profiles' => $profiles,
        ]);
    }
}
