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

Route::get('/petugas', function () {
    return view('auth.login_petugas');
});

Route::get('/', function () {
    return view('auth.login_siswa');
})->name('login');

Route::post('/proses', [LoginController::class, 'petugas'])->name('proses-petugas');