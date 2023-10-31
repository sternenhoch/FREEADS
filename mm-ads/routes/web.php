<?php

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;

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
Route::get('/index', [AdsController::class, 'index']);//main page
Route::get('/signup', [Controller::class, 'signup']);
Route::get('/login', [Controller::class, 'login']);
Route::post('/register', [Controller::class, 'register']);
Route::get('/ad', [Controller::class, 'ad']);//une annonce agrandie






