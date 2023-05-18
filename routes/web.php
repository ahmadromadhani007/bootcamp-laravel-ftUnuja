<?php

use App\Http\Controllers\Master\MahasiswaController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TampilanController;
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
    return view('dashboard');
});

Route::get('/dosen', function () {
    return view('datamasters\dosen\list');
});
//tb_mahasiswa
Route::get('/mahasiswa',[MahasiswaController::class, 'index'])->name('dm.mahasiswa');

// Route::get('/', [TampilanController::class,'index']);
