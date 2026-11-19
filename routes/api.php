<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServisMotorController;

// Endpoint Data Pelanggan
Route::get('/pelanggan', [ServisMotorController::class, 'indexPelanggan']);
Route::post('/pelanggan', [ServisMotorController::class, 'storePelanggan']);

// Endpoint Data Kendaraan
Route::get('/kendaraan', [ServisMotorController::class, 'indexKendaraan']);
Route::post('/kendaraan', [ServisMotorController::class, 'storeKendaraan']);

// Endpoint Daftar Service
Route::get('/daftar-service', [ServisMotorController::class, 'indexDaftarService']);
Route::post('/daftar-service', [ServisMotorController::class, 'storeDaftarService']);

// Endpoint Data Service
Route::get('/data-service', [ServisMotorController::class, 'indexDataService']);
Route::post('/data-service', [ServisMotorController::class, 'storeDataService']);

// Endpoint Pembayaran Service
Route::get('/pembayaran', [ServisMotorController::class, 'indexPembayaran']);
Route::post('/pembayaran', [ServisMotorController::class, 'storePembayaran']);