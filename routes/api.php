<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('/jabatan', JabatanController::class);
Route::resource('/karyawan', KaryawanController::class);
Route::resource('/divisi', DivisiController::class);

//jwt register
Route::post('/register', \App\Http\Controllers\Api\RegisterController::class)->name('register');


Route::resource('/pekerjaan', PekerjaanController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
