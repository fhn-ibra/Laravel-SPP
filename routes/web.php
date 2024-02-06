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
    //index
    Route::get('/siswa', [AdminController::class, 'index_siswa'])->name('siswa');
    Route::get('/kelas', [AdminController::class, 'index_kelas'])->name('kelas');
    Route::get('/spp', [AdminController::class, 'index_spp'])->name('spp');
    Route::get('/kelas', [AdminController::class, 'index_kelas'])->name('kelas');
    Route::get('/petugas', [AdminController::class, 'index_petugas'])->name('petugas');

    //kelas
    Route::delete('/kelas-delete', [AdminController::class, 'delete_kelas'])->name('kelas-delete');
    Route::post('/kelas-save', [AdminController::class, 'save_kelas'])->name('kelas-save');
    Route::post('/kelas-edit', [AdminController::class, 'edit_kelas'])->name('kelas-edit');

    //spp
    Route::delete('/spp-delete', [AdminController::class, 'delete_spp'])->name('spp-delete');
    Route::post('/spp-save', [AdminController::class, 'save_spp'])->name('spp-save');
    Route::post('/spp-edit', [AdminController::class, 'edit_spp'])->name('spp-edit');
});



Route::group(['middleware' => ['petugas']], function () {
});
