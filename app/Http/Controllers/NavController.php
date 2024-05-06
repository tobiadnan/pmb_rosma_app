<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->check()) {
            $profile = $request->user()->profile;
            return view('main-page', [
                'profile' => $profile,
            ]);
        } else {
            # code...
            return view('main-page');
        }
    }

    public function ti(Request $request)
    {
        if (auth()->check()) {
            $profile = Profile::where('id', $request->user()->id)->first();
            return view('content.ti', [
                'profile' => $profile,
            ]);
        } else {
            # code...
            return view('content.ti');
        }
    }
    public function si(Request $request)
    {
        if (auth()->check()) {
            $profile = Profile::where('id', $request->user()->id)->first();
            return view('content.si', [
                'profile' => $profile,
            ]);
        } else {
            # code...
            return view('content.si');
        }
    }
    public function mi(Request $request)
    {
        if (auth()->check()) {
            $profile = Profile::where('id', $request->user()->id)->first();
            return view('content.mi', [
                'profile' => $profile,
            ]);
        } else {
            # code...
            return view('content.mi');
        }
    }
    public function ka(Request $request)
    {
        if (auth()->check()) {
            $profile = Profile::where('id', $request->user()->id)->first();
            return view('content.ka', [
                'profile' => $profile,
            ]);
        } else {
            # code...
            return view('content.ka');
        }
    }
}
