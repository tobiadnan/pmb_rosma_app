<?php

namespace App\Http\Controllers;

use App\DataTables\HomeAdminDataTable;
use App\DataTables\RegisterDataTable;
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
}
