<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DroneRegistrationController;
use App\Http\Controllers\Auth\PhoneVerificationController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('drone-registration', [DroneRegistrationController::class, 'index'])->name('drone.registration');
Route::post('drone-registration', [DroneRegistrationController::class, 'register'])->name('drone.register');

Route::post('/request-otp', [PhoneVerificationController::class, 'requestOtp']);
Route::post('/verify-otp', [PhoneVerificationController::class, 'verifyOtp']);

