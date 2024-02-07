<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
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
    Route::get('/petugas-login', [LoginController::class, 'indexpetugas'])->name('login-petugas');

    Route::post('/prosessiswa', [LoginController::class, 'prosessiswa'])->name('proses-siswa');
    Route::post('/prosespetugas', [LoginController::class, 'prosespetugas'])->name('proses-petugas');
});

Route::get('/siswa-index/{id}', [SiswaController::class, 'index'])->name('siswa-index');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pembayaran', [PetugasController::class, 'index_pembayaran'])->name('pembayaran');

    Route::delete('/pembayaran-delete', [PetugasController::class, 'delete_pembayaran'])->name('pembayaran-delete');
    Route::post('/pembayaran-save', [PetugasController::class, 'save_pembayaran'])->name('pembayaran-save');
    Route::post('/pembayaran-edit', [PetugasController::class, 'edit_pembayaran'])->name('pembayaran-edit');


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

    //siswa
    Route::delete('/siswa-delete', [AdminController::class, 'delete_siswa'])->name('siswa-delete');
    Route::post('/siswa-save', [AdminController::class, 'save_siswa'])->name('siswa-save');
    Route::post('/siswa-edit', [AdminController::class, 'edit_siswa'])->name('siswa-edit');

     //petugas
     Route::delete('/petugas-delete', [AdminController::class, 'delete_petugas'])->name('petugas-delete');
     Route::post('/petugas-save', [AdminController::class, 'save_petugas'])->name('petugas-save');
     Route::post('/petugas-edit', [AdminController::class, 'edit_petugas'])->name('petugas-edit');
});



// Route::group(['middleware' => ['petugas']], function () {
// });
