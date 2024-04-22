<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',  [MainController::class, 'index'])->name('main_page');

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

// User User
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home',  [ProfileController::class, 'edit'])->name('home');
});

// Admin Access Only
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/home',  [AdminController::class, 'index'])->name('admin/home');
});
