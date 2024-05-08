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
            return view('main-page', compact('profile'));
        } else {
            return view('main-page');
        }
    }


    public function showContentProdi(Request $request, $content)
    {
        $viewName = 'content.' . $content;

        if (auth()->check()) {
            $profile = $request->user()->profile;
            return view($viewName, compact('profile'));
        } else {
            return view($viewName);
        }
    }
}
