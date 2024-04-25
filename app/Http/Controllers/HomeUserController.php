<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index(Request $request)
    {
        $profile = Profile::where('id', $request->user()->id)->first();

        return view('user.home', [
            'profile' => $profile,
        ]);
    }
}
