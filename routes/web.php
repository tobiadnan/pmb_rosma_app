<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/ti', function () {
    return view('prodi.ti');
});
Route::get('/si', function () {
    return view('prodi.si');
});
Route::get('/mi', function () {
    return view('prodi.mi');
});
Route::get('/ka', function () {
    return view('prodi.ka');
});

Route::get('/kacer', function () {
    return view('beasiswa.kacer');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/profile', function () {
    return view('auth.profile');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
