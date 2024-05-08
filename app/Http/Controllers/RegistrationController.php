<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $profile = $request->user()->profile;
        $registration = $profile->registrations()->first();

        if ($registration) {
            $prodi = $registration->prodie()->first();
        }

        if ($registration->is_verif) {
            $no_reg = 'PMBRSM/' . date('Y') . '/' . $registration->id;
        } else {
            $no_reg = '-';
        }

        // dd($no_reg);
        return view('user.registration', [
            'profile' => $profile,
            'prodi' => $prodi,
            'registration' => $registration,
            'no_reg' => $no_reg,
        ]);
    }
}
