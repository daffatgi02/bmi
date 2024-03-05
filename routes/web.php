<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BidanController;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DatabulananController;
use App\Http\Controllers\DataPosyanduController;
use App\Http\Controllers\ExportpdfController;
use App\Http\Controllers\GrafikPerkembanganController;
use App\Http\Controllers\IbubalitaController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Guest
Route::get('/', function () {
    return view('landingpage');
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

        Route::get('exportpdf/{danaks_id}', [ExportpdfController::class, 'exportpdf'])->name('exportpdf');

        Route::get('/update', [DatabulananController::class, 'destroy2'])->name('destroy2');
        Route::delete('login/delete1/{id}', [DatabulananController::class, 'destroy3'])->name('destroy3');





        // DataPosyanduController
        Route::resource('dposyandus', DataPosyanduController::class);
        Route::get('gettabelposyandu', [DataPosyanduController::class, 'getData'])->name('dposyandus.getData');



        // GrafikPerkembanganController
        Route::resource('gperkembangans', GrafikPerkembanganController::class);



        // RiwayatController
        Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
        Route::get('gettabelriwayat', [RiwayatController::class, 'getData']);
        Route::put('riwayatpost', [RiwayatController::class, 'store'])->name('riwayatpost');


    });




    // KADER
    Route::middleware(['kader'])->group(function () {
        // Route kader
        Route::resource('kaders', KaderController::class);
        // Route::get('gettabelantrian2', [KaderController::class, 'getData2'])->name('antrians.getData');
        Route::post('/storekader', [KaderController::class, 'storekader'])->name('storekader');
        Route::get('/pposyandu', [KaderController::class, 'pposyandu'])->name('pposyandu');
        Route::delete('login/delete2/{id}', [KaderController::class, 'destroykader'])->name('destroykader');
        Route::put('riwayatpostkader', [KaderController::class, 'storeriwayat'])->name('riwayatpostkader');
    });
});



// Antrian
Route::resource('antrians', AntrianController::class);
Route::get('gettabelantrian', [AntrianController::class, 'getData'])->name('antrians.getData');


// EKMS
Route::resource('ekms', IbubalitaController::class);
Route::get('getekms', [IbubalitaController::class, 'getData'])->name('ekms.getData');

