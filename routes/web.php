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
    Route::get('/siswa', [AdminController::class, 'index_siswa'])->name('siswa');
    Route::get('/kelas', [AdminController::class, 'index_kelas'])->name('kelas');
    // Route::get('/kelas', [AdminController::class, 'index_kelas'])->name('kelas');
    // Route::get('/kelas', [AdminController::class, 'index_kelas'])->name('kelas');

    Route::delete('/kelas-delete', [AdminController::class, 'delete_kelas'])->name('kelas-delete');
    Route::post('/kelas-save', [AdminController::class, 'save_kelas'])->name('kelas-save');
});



Route::group(['middleware' => ['petugas']], function () {
});
