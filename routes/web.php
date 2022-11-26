<?php

use App\Http\Controllers\FormAbsensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekapitulasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
})->name('landing-page')->middleware('guest');

Route::get('/rekapitulasi', [RekapitulasiController::class,'index'])->name('rekapitulasi')->middleware('auth');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', function () {
        return view('home');
    })->name('home');


    Route::post('/form-absensi', [FormAbsensiController::class, 'store'])->name('form-absensi.store');
    Route::get('/form-absensi',[FormAbsensiController::class, 'index'])->name('form-absensi');
    Route::put('/form-absensi/{formAbsensi}', [FormAbsensiController::class, 'update'])->name('form-absensi.update');
    Route::get('/form-absensi/{formAbsensi}/edit', [FormAbsensiController::class, 'edit'])->name('form-absensi.edit');
    Route::delete('/form-absensi/{formAbsensi}',[FormAbsensiController::class, 'destroy'])->name('form-absensi.hapus');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
