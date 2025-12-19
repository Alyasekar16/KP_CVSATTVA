<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\Admin\AdminTentangController;

Route::get('/', [BerandaController::class, 'beranda']);
Route::get('/kontak', [BerandaController::class, 'kontak']);
Route::get('/proyek', [ProyekController::class, 'userIndex'])->name('user.proyek');

Route::get('/tentang', [BerandaController::class, 'tentang']);
Route::get('/tentang/perusahaan', [TentangController::class, 'perusahaan']);
Route::get('/tentang/tim', [TentangController::class, 'tim']);
Route::get('/tentang/penghargaan', [TentangController::class, 'penghargaan']);

Route::get('/admin', [AdminController::class, 'beranda']);
Route::get('/admin/beranda', [AdminController::class, 'beranda']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::get('/admin/ulasan', [AdminController::class, 'ulasan']);
Route::get('/admin/klien', [AdminController::class, 'klien']);
Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

// Proyek routes (ProyekController)
Route::prefix('admin/proyek')->group(function () {
    Route::get('/', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('/create', [ProyekController::class, 'create'])->name('proyek.create');
    Route::post('/', [ProyekController::class, 'store'])->name('proyek.store');
    Route::get('/{id}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
    Route::put('/{id}', [ProyekController::class, 'update'])->name('proyek.update');
    Route::delete('/{id}', [ProyekController::class, 'destroy'])->name('proyek.destroy');
});

// Tentang Karyawan routes (Admin\TentangController)
Route::prefix('admin/tentang/karyawan')->group(function () {
    Route::get('/', [AdminTentangController::class, 'index'])->name('admin.tentang.karyawan.index');
    Route::get('/create', [AdminTentangController::class, 'create'])->name('admin.tentang.karyawan.create');
    Route::post('/', [AdminTentangController::class, 'store'])->name('admin.tentang.karyawan.store');
    Route::get('/{id}/edit', [AdminTentangController::class, 'edit'])->name('admin.tentang.karyawan.edit');
    Route::put('/{id}', [AdminTentangController::class, 'update'])->name('admin.tentang.karyawan.update');
    Route::delete('/{id}', [AdminTentangController::class, 'destroy'])->name('admin.tentang.karyawan.destroy');
});