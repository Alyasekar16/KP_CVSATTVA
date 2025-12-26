<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AProyekController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\PerusahaanController;
use App\Http\Controllers\Admin\PenghargaanController;
use App\Http\Controllers\Admin\AKomenController;
use App\Http\Controllers\Admin\AKontakController;
use App\Http\Controllers\Admin\AOrderController;



// USER
Route::get('/', [BerandaController::class, 'beranda']);
Route::get('/kontak', [KontakController::class, 'kontak'])->name('kontak');
Route::get('/proyek', [ProyekController::class, 'userIndex'])->name('user.proyek');
Route::get('/proyek/{id}', [ProyekController::class, 'show'])->name('user.proyek.proyek_detail');

/// TENTANG
Route::get('/tentang', [BerandaController::class, 'tentang']);
Route::get('/tentang/perusahaan', [TentangController::class, 'perusahaan']);
Route::get('/tentang/tim', [TentangController::class, 'tim']);
Route::get('/tentang/penghargaan', [TentangController::class, 'penghargaan']);

// KOMEN
Route::post('/proyek/komen', [KomenController::class, 'store'])->name('komen.store');
Route::delete('/admin/komen/{id}', [KomenController::class, 'destroy'])->name('admin.komen.destroy');


// ROUTE ADMIN
// hanya admin belom lgin yang bisa akses 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// untuk mengirim order jasa
Route::post('/order', [OrderController::class, 'store'])
    ->name('order.store');

// Middleware auth untuk route admin
Route::middleware('auth')->group(function () {

    // Di dalam Route::middleware(['auth'])->group(function () { ... });
    Route::get('/admin/beranda', function () {
        return view('admin.beranda'); // Buat file resources/views/admin/beranda.blade.php
    })->name('admin.beranda');


    // Proyek routes (AProyekController)
    Route::prefix('admin/proyek')->group(function () {
        Route::get('/', [AProyekController::class, 'index'])->name('proyek.index');
        Route::get('/create', [AProyekController::class, 'create'])->name('proyek.create');
        Route::post('/', [AProyekController::class, 'store'])->name('proyek.store');
        Route::get('/{id}/edit', [AProyekController::class, 'edit'])->name('proyek.edit');
        Route::put('/{id}', [AProyekController::class, 'update'])->name('proyek.update');
        Route::delete('/{id}', [AProyekController::class, 'destroy'])->name('proyek.destroy');
        Route::get('/grafik', [AProyekController::class, 'chart'])->name('proyek.grafik');
    });

    ///TENTANG
    // Tentang Karyawan routes (KaryawanController)
    Route::prefix('admin/tentang/karyawan')
        ->name('admin.tentang.karyawan.')
        ->group(function () {
            Route::get('/', [KaryawanController::class, 'index'])->name('index');
            Route::get('/create', [KaryawanController::class, 'create'])->name('create');
            Route::post('/', [KaryawanController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [KaryawanController::class, 'edit'])->name('edit');
            Route::put('/{id}', [KaryawanController::class, 'update'])->name('update');
            Route::delete('/{id}', [KaryawanController::class, 'destroy'])->name('destroy');
        });

    // Tentang Perusahaan routes (PerusahaanController)
    Route::prefix('admin/tentang/perusahaan')
        ->name('admin.tentang.perusahaan.')
        ->group(function () {
            Route::get('/', [PerusahaanController::class, 'index'])->name('index');
            Route::get('/create', [PerusahaanController::class, 'create'])->name('create');
            Route::post('/', [PerusahaanController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PerusahaanController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PerusahaanController::class, 'update'])->name('update');
            Route::delete('/{id}', [PerusahaanController::class, 'destroy'])->name('destroy');
        });

    // Tentang Penghargaan routes (PenghargaanController)
    Route::prefix('admin/tentang/penghargaan')
        ->name('admin.tentang.penghargaan.')
        ->group(function () {
            Route::get('/', [PenghargaanController::class, 'index'])->name('index');
            Route::get('/create', [PenghargaanController::class, 'create'])->name('create');
            Route::post('/', [PenghargaanController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PenghargaanController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PenghargaanController::class, 'update'])->name('update');
            Route::delete('/{id}', [PenghargaanController::class, 'destroy'])->name('destroy');
        });

    // Komen routes (AKomenController)
    Route::prefix('admin/komen')->group(function () {
        Route::get('/', [AKomenController::class, 'index'])->name('komen.index');
        Route::get('/{id}/balas', [AKomenController::class, 'balas'])->name('komen.balas');
        Route::put('/{id}/balas', [AKomenController::class, 'storeBalasan'])->name('komen.storeBalasan');
        Route::delete('/{id}', [AKomenController::class, 'destroy'])->name('komen.destroy');
    });

    // Kontak routes (AKontakController)
    Route::prefix('admin/kontak')->group(function () {
        Route::get('/', [AKontakController::class, 'index'])->name('kontak.index');
        Route::get('/create', [AKontakController::class, 'create'])->name('kontak.create');
        Route::post('/', [AKontakController::class, 'store'])->name('kontak.store');
        Route::get('/{id}/edit', [AKontakController::class, 'edit'])->name('kontak.edit');
        Route::put('/{id}', [AKontakController::class, 'update'])->name('kontak.update');
        Route::delete('/{id}', [AKontakController::class, 'destroy'])->name('kontak.destroy');
    });

    // Order routes (AOrderController)
    Route::prefix('admin/order')->name('admin.order.')->group(function () {
        Route::get('/', [AOrderController::class, 'index'])->name('index');
        Route::get('/{id}', [AOrderController::class, 'show'])->name('show');
        Route::put('/{id}/status', [AOrderController::class, 'updateStatus'])->name('status');
        Route::delete('/{id}', [AOrderController::class, 'destroy'])->name('destroy');
    });
});
