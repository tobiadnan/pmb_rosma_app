<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function Spatie\LaravelPdf\Support\pdf;

class TestController extends Controller
{
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


        return view('pdfs.test-card', [
            'profile' => $profile,
            'prodi' => $prodi,
            'registration' => $registration,
            'no_reg' => $no_reg,
            'user' => $request->user(),
        ]);
    }
    public function download(Request $request)
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


        $pdf = Pdf::loadView('pdfs.test-card', [
            'profile' => $profile,
            'prodi' => $prodi,
            'registration' => $registration,
            'no_reg' => $no_reg,
            'user' => $request->user(),
        ]);

        $filename = 'kartu_test-' . $profile->nama_d . ' ' . $profile->nama_b . '.pdf';

        return $pdf->stream($filename);
    }
}
