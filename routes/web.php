<?php

use App\Http\Controllers\AntrianController;
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


// Controller Login
Route::prefix('login')->middleware(['auth'])->group(function () {

    // BIDAN
    Route::middleware(['bidan'])->group(function () {
        // Bidan Controller
        Route::resource('bidans', BidanController::class);


        // DataAnakController
        Route::resource('danaks', DataAnakController::class);
        Route::get('gettabelanak', [DataAnakController::class, 'getData'])->name('danaks.getData');


        // DatabulananController
        Route::resource('dbulanans', DatabulananController::class);
        Route::get('gettabelbulanan', [DatabulananController::class, 'getData'])->name('dbulanans.getData');
        Route::get('gettabelantrian1', [DatabulananController::class, 'getData2'])->name('antrians.getData');
        Route::get('exportbulanan', [DatabulananController::class, 'exportbulanan'])->name('exportbulanan');




        // DataPosyanduController
        Route::resource('dposyandus', DataPosyanduController::class);
        Route::get('gettabelposyandu', [DataPosyanduController::class, 'getData'])->name('dposyandus.getData');



        // GrafikPerkembanganController
        Route::resource('gperkembangans', GrafikPerkembanganController::class);

    });




    // KADER
    Route::middleware(['kader'])->group(function () {
        // Route kader
        Route::resource('kaders', KaderController::class);
        Route::get('gettabelantrian2', [KaderController::class, 'getData2'])->name('antrians.getData');

    });
});



// Antrian
Route::resource('antrians', AntrianController::class);
Route::get('gettabelantrian', [AntrianController::class, 'getData'])->name('antrians.getData');
