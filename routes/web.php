<?php

use App\Http\Controllers\LoginController;
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

Route::group(['middleware' => ['guest']], function(){   
    Route::get('/', [LoginController::class, 'indexsiswa'])->name('login');
    Route::get('/petugas', [LoginController::class, 'indexpetugas'])->name('login-petugas');

    Route::post('/prosessiswa', [LoginController::class, 'prosessiswa'])->name('proses-siswa');
    Route::post('/prosespetugas', [LoginController::class, 'prosespetugas'])->name('proses-petugas');
});

Route::group(['middleware' => ['auth']], function(){ 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['admin']], function(){   
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware' => ['petugas']], function(){   
    Route::get('/dashboard2', [LoginController::class, 'dashboard2'])->name('dashboard2');
});