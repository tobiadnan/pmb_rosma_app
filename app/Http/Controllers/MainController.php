<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        // dd(auth()->check());

        if (auth()->check()) {
            $profile = Profile::where('id', $request->user()->id)->first();
            return view('main-page', [
                'profile' => $profile,
            ]);
        } else {
            # code...
            return view('main-page');
        }
    }
}
