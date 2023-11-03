<?php

use App\Models\Ads;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AdsController::class, 'index']);//main page
Route::get('/signup', [Controller::class, 'signup']);
Route::post('/signin', [Controller::class, 'signin']);
Route::get('/login', [Controller::class, 'login']);
Route::post('/register', [Controller::class, 'register']);
Route::get('/ad', [AdsController::class, 'ad']);//une annonce agrandie
Route::post('/logout', [Controller::class, 'logout']);
Route::resource('ads', AdsController::class);


Route::controller(VerificationController::class)->group(function() {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/email/resend', 'resend')->name('verification.resend');
});