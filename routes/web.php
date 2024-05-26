<?php

use App\Http\Controllers\AppendixController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/',  [NavController::class, 'index'])->name('main_page');

Route::prefix('content')->group(function () {
    Route::get('/prodi/{content}',  [NavController::class, 'showContentProdi'])->name('content.show');

    Route::get('ti', [NavController::class, 'ti'])->name('content.ti');
    Route::get('si', [NavController::class, 'si'])->name('content.si');
    Route::get('mi', [NavController::class, 'mi'])->name('content.mi');
    Route::get('ka', [NavController::class, 'ka'])->name('content.ka');
});

Route::get('/email', function () {
    return view('emails.payment_info');
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
    Route::get('/home/',  [HomeUserController::class, 'index'])->name('home');
    Route::post('/home/{id}/update',  [HomeUserController::class, 'update'])->name('home.update');
    Route::post('/home/{id}/verif',  [HomeUserController::class, 'verif'])->name('home.verif');
    Route::post('/home/{id}/store',  [AppendixController::class, 'store'])->name('appendix.store');

    Route::get('/registration/',  [RegistrationController::class, 'index'])->name('registration');
    Route::get('/profile/',  [ProfileController::class, 'edit'])->name('profile');
    Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/test-card/', [TestController::class, 'index'])->name('test.card');
    Route::get('/test-card/download', [TestController::class, 'download'])->name('test.card.download');
});

// Admin Access Only
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/home',  [HomeAdminController::class, 'index'])->name('admin.home');
    Route::prefix('/register')->group(function () {
        Route::get('/waiting-verif', [RegisterAdminController::class, 'waitingVerif'])->name('admin.waiting_verif');
        Route::get('/unconfirmed', [RegisterAdminController::class, 'unconfirmed'])->name('admin.unconfirmed');
        Route::get('/unuploaded', [RegisterAdminController::class, 'unuploaded'])->name('admin.unuploaded');
        Route::get('/verified', [RegisterAdminController::class, 'verified'])->name('admin.all_register');
    });
});
