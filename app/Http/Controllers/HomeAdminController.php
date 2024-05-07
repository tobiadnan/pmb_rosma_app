<?php

namespace App\Http\Controllers;

use App\DataTables\HomeAdminDataTable;
use App\Models\Profile;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(HomeAdminDataTable  $dataTable)
    {
        // Ambil data user dari database
        $totalPendaftar = Profile::count();
        $totalBelumVerifikasi = Registration::where('is_verif', false)->count();
        $totalBelumApprove = Registration::where('is_verif', true)
            ->where('is_set', false)
            ->count();

        $profiles = Profile::with(['registrations', 'registrations.prodie'])
            ->get();


        return $dataTable->render('admin.home', [
            'totalPendaftar' => $totalPendaftar,
            'totalBelumVerifikasi' => $totalBelumVerifikasi,
            'totalBelumApprove' => $totalBelumApprove,
            'profiles' => $profiles,
        ]);
    }
}
