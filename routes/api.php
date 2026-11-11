<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\AbsensiController;

Route::apiResource('mahasiswa', MahasiswaController::class);
Route::apiResource('absensi', AbsensiController::class);
