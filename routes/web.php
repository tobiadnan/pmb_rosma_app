<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
    return view('main-page');
})->name('main_page');

Route::get('/ti', function () {
    return view('content.ti');
});
Route::get('/si', function () {
    return view('content.si');
});
Route::get('/mi', function () {
    return view('content.mi');
});
Route::get('/ka', function () {
    return view('content.ka');
});

Route::get('/kacer', function () {
    return view('kacer');
});


Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// User Guests 
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home',  [HomeController::class, 'index'])->name('home');
});

// Admin Access Only
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/home',  [HomeController::class, 'admin_home'])->name('admin/home');
});
