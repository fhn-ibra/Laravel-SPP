<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [LoginController::class, 'indexsiswa'])->name('login');
    Route::get('/petugas', [LoginController::class, 'indexpetugas'])->name('login-petugas');

    Route::post('/prosessiswa', [LoginController::class, 'prosessiswa'])->name('proses-siswa');
    Route::post('/prosespetugas', [LoginController::class, 'prosespetugas'])->name('proses-petugas');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::group(['middleware' => ['admin']], function () {
});



Route::group(['middleware' => ['petugas']], function () {
});
