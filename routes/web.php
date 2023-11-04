<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BidanController;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DatabulananController;
use App\Http\Controllers\DataPosyanduController;
use App\Http\Controllers\GrafikPerkembanganController;
use App\Http\Controllers\KaderController;
use Illuminate\Support\Facades\Auth;
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

// Guest
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Login
Auth::routes();
Route::post('/login', [LoginController::class, 'authenticate']);


// Bidan
Route::prefix('login')->middleware(['auth', 'bidan'])->group(function(){
    // Bidan Controller
    Route::resource('bidans',BidanController::class);


    // DataAnakController
    Route::resource('danaks',DataAnakController::class);


    // DatabulananController
    Route::resource('dbulanans',DatabulananController::class);



    // DataPosyanduController
    Route::resource('dposyandus',DataPosyanduController::class);



    // GrafikPerkembanganController
    Route::resource('gperkembangans',GrafikPerkembanganController::class);

});


// Kader
Route::prefix('login')->middleware(['auth', 'kader'])->group(function(){
    Route::resource('kaders',KaderController::class);

});
