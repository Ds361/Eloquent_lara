<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::post('/karyawan', [KaryawanController::class, 'store']) -> name('karyawan.create');
Route::get('/karyawan/tambah', [KaryawanController::class, 'show']) -> name('karyawan.tambah');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');

Route::get('/gaji', [GajiController::class, 'index'])->name('gaji');
Route::post('/gaji', [GajiController::class, 'store']) -> name('gaji.create');
Route::get('/gaji/tambah', [GajiController::class, 'show']) -> name('gaji.tambah');
Route::put('/gaji/{id}', [GajiController::class, 'update'])->name('gaji.update');
Route::get('/gaji/{id}', [GajiController::class, 'edit'])->name('gaji.edit');
Route::delete('/gaji/{id}', [GajiController::class, 'destroy'])->name('gaji.delete');
