<?php

namespace App\Http\Controllers;

use App\DataTables\HomeAdminDataTable;
use App\Models\Profile;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    public function index(HomeAdminDataTable  $dataTable)
    {
        $profiles = Profile::with(['registrations', 'registrations.prodie'])->get();


        return $dataTable->render('admin.register-table', [
            'profiles' => $profiles,
        ]);
    }
}
