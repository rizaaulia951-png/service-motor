<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServisMotorController;

// MODEL
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\PembayaranService;


// ===================================
// HALAMAN UTAMA
// ===================================

Route::get('/', function () {

    // Statistik data
    $totalPelanggan = Pelanggan::count();

    $totalKendaraan = Kendaraan::count();

    $totalDaftarServis = DaftarService::count();

    $totalRiwayatServis = DataService::count();

    $totalPembayaran = PembayaranService::count();

    $totalPendapatan = PembayaranService::sum('jumlah_biaya_servis');


    // Mengambil 5 data servis terbaru
    $servisTerbaru = DaftarService::with('pelanggan')
        ->orderByDesc('tanggal_servis')
        ->take(5)
        ->get();


    // ID servis yang sudah memiliki data pengerjaan
    $idServisDiproses = DataService::pluck(
        'id_servis_pelanggan'
    )->unique()->toArray();


    // ID servis yang sudah melakukan pembayaran
    $idServisSelesai = PembayaranService::pluck(
        'id_servis_pelanggan'
    )->unique()->toArray();


    return view('dashboard', compact(
        'totalPelanggan',
        'totalKendaraan',
        'totalDaftarServis',
        'totalRiwayatServis',
        'totalPembayaran',
        'totalPendapatan',
        'servisTerbaru',
        'idServisDiproses',
        'idServisSelesai'
    ));

})->name('dashboard');


// ===================================
// DATA PELANGGAN
// ===================================

Route::get('/pelanggan', [ServisMotorController::class, 'halamanPelanggan'])
    ->name('pelanggan.index');

Route::post('/pelanggan', [ServisMotorController::class, 'storePelanggan'])
    ->name('pelanggan.store');

Route::get('/pelanggan/{id_pelanggan}/edit', [ServisMotorController::class, 'editPelanggan'])
    ->name('pelanggan.edit');

Route::put('/pelanggan/{id_pelanggan}', [ServisMotorController::class, 'updatePelanggan'])
    ->name('pelanggan.update');

Route::delete('/pelanggan/{id_pelanggan}', [ServisMotorController::class, 'hapusPelanggan'])
    ->name('pelanggan.destroy');


// ===================================
// DATA KENDARAAN
// ===================================

Route::get('/kendaraan', [ServisMotorController::class, 'halamanKendaraan'])
    ->name('kendaraan.index');

Route::post('/kendaraan', [ServisMotorController::class, 'storeKendaraanWebsite'])
    ->name('kendaraan.store');

Route::get('/kendaraan/{id}/edit', [ServisMotorController::class, 'editKendaraan'])
    ->name('kendaraan.edit');

Route::put('/kendaraan/{id}', [ServisMotorController::class, 'updateKendaraan'])
    ->name('kendaraan.update');

Route::delete('/kendaraan/{id}', [ServisMotorController::class, 'hapusKendaraan'])
    ->name('kendaraan.destroy');


// ===================================
// DAFTAR SERVIS
// ===================================

Route::get('/daftar-service', [ServisMotorController::class, 'halamanDaftarService'])
    ->name('daftar-service.index');

Route::post('/daftar-service', [ServisMotorController::class, 'storeDaftarServiceWebsite'])
    ->name('daftar-service.store');

Route::get('/daftar-service/{id}/edit', [ServisMotorController::class, 'editDaftarService'])
    ->name('daftar-service.edit');

Route::put('/daftar-service/{id}', [ServisMotorController::class, 'updateDaftarService'])
    ->name('daftar-service.update');

Route::delete('/daftar-service/{id}', [ServisMotorController::class, 'hapusDaftarService'])
    ->name('daftar-service.destroy');


// ===================================
// RIWAYAT / DATA SERVIS
// ===================================

Route::get('/data-service', [ServisMotorController::class, 'indexDataService'])
    ->name('data-service.index');

Route::post('/data-service', [ServisMotorController::class, 'storeDataService'])
    ->name('data-service.store');

Route::get('/data-service/{id}/edit', [ServisMotorController::class, 'editDataService'])
    ->name('data-service.edit');

Route::put('/data-service/{id}', [ServisMotorController::class, 'updateDataService'])
    ->name('data-service.update');

Route::delete('/data-service/{id}', [ServisMotorController::class, 'hapusDataService'])
    ->name('data-service.destroy');


// ===================================
// PEMBAYARAN SERVIS
// ===================================

Route::get('/pembayaran', [ServisMotorController::class, 'indexPembayaran'])
    ->name('pembayaran.index');

Route::post('/pembayaran', [ServisMotorController::class, 'storePembayaran'])
    ->name('pembayaran.store');

Route::get('/pembayaran/{id}/edit', [ServisMotorController::class, 'editPembayaran'])
    ->name('pembayaran.edit');

Route::put('/pembayaran/{id}', [ServisMotorController::class, 'updatePembayaran'])
    ->name('pembayaran.update');

Route::delete('/pembayaran/{id}', [ServisMotorController::class, 'hapusPembayaran'])
    ->name('pembayaran.destroy');
