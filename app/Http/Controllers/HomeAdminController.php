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
        $totalPendaftar = Registration::where('is_set', true)->count();
        $totalBelumVerifikasi = Registration::where('is_verif', false)->count();
        $totalBelumUnggahBerkas = Registration::where('is_verif', true)
            ->whereNull('appendix_id')
            ->count();
        $totalBelumApprove = Registration::where('is_verif', true)
            ->where('is_set', false)
            ->whereNotNull('appendix_id')
            ->count();

        $profiles = Profile::with(['registrations', 'registrations.prodie'])
            ->get();


        return $dataTable->render('admin.home', [
            'totalPendaftar' => $totalPendaftar,
            'totalBelumVerifikasi' => $totalBelumVerifikasi,
            'totalBelumApprove' => $totalBelumApprove,
            'totalBelumUnggahBerkas' => $totalBelumUnggahBerkas,
            'profiles' => $profiles,
        ]);
    }
}
