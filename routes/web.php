<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Guru Routes
Route::prefix('guru')->middleware(['auth:guru'])->group(function () {
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');
    
    // Siswa Management
    Route::get('/siswa', [GuruController::class, 'siswaIndex'])->name('guru.siswa.index');
    Route::get('/siswa/create', [GuruController::class, 'siswaCreate'])->name('guru.siswa.create');
    Route::post('/siswa', [GuruController::class, 'siswaStore'])->name('guru.siswa.store');
    Route::get('/siswa/{siswa}/edit', [GuruController::class, 'editSiswa'])->name('guru.siswa.edit');
    Route::put('/siswa/{siswa}', [GuruController::class, 'updateSiswa'])->name('guru.siswa.update');
    Route::delete('/siswa/{siswa}', [GuruController::class, 'destroySiswa'])->name('guru.siswa.destroy');
    
    // Nilai Management
    Route::get('/nilai', [GuruController::class, 'nilaiIndex'])->name('guru.nilai.index');
    Route::get('/nilai/create', [GuruController::class, 'nilaiCreate'])->name('guru.nilai.create');
    Route::post('/nilai', [GuruController::class, 'nilaiStore'])->name('guru.nilai.store');
    // Inside the guru prefix group, add these routes
    Route::get('/nilai/{id}/edit', [GuruController::class, 'nilaiEdit'])->name('guru.nilai.edit');
    Route::put('/nilai/{id}', [GuruController::class, 'nilaiUpdate'])->name('guru.nilai.update');
    Route::delete('/nilai/{id}', [GuruController::class, 'nilaiDestroy'])->name('guru.nilai.destroy');
    Route::get('/guru/siswa/{siswa}/edit', [GuruController::class, 'editSiswa'])->name('guru.siswa.edit');
    Route::put('/guru/siswa/{siswa}', [GuruController::class, 'updateSiswa'])->name('guru.siswa.update');
});

// Siswa Routes
Route::prefix('siswa')->middleware(['auth:siswa'])->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
});

