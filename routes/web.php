<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BidanController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::post('/login', [LoginController::class, 'authenticate']);

Route::prefix('login')->middleware(['auth', 'bidan'])->group(function(){
    // Bidan
    Route::resource('bidans',BidanController::class);

});
Route::prefix('login')->middleware(['auth', 'kader'])->group(function(){
    // Bidan
    Route::resource('kaders',KaderController::class);

});
