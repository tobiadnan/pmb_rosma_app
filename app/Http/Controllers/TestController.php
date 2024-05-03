<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class TestController extends Controller
{
    public function __invoke()
    {
        return Pdf::view('pdfs.test-card')
            ->format('a4')
            ->name('kartu-test-pmb_rosma.pdf');
    }
}
