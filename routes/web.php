<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use App\Models\Karyawan;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Karyawan routes
    Route::get('/karyawan', function () {
        return Inertia::render('Karyawan/Index');
    })->name('karyawan.index');

    Route::get('/karyawan/create', function () {
        return Inertia::render('Karyawan/Create');
    })->name('karyawan.create');

    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    
    Route::get('/karyawan/{id}/edit', function ($id) {
        $karyawan = Karyawan::findOrFail($id);
        return Inertia::render('Karyawan/Edit', [
            'karyawan' => $karyawan
        ]);
    })->name('karyawan.edit');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
