<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Ambil data user dari database
        $user = User::where('id', $request->user()->id)->first();

        // Kirim data user ke view profile
        return view('profile', [
            'user' => $user,
        ]);
    }

    public function admin_home()
    {
        return view('admin/dashboard');
    }
}
