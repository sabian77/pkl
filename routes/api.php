<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use Tymon\JWTAuth\Facades\JWTAuth;


Route::resource('/jabatan', JabatanController::class);
Route::resource('/karyawan', KaryawanController::class);
Route::resource('/divisi', DivisiController::class);
Route::resource('/pekerjaan', PekerjaanController::class);

//jwt register
Route::post('/register', RegisterController::class)->name('register');
//jwt login
Route::post('/login', LoginController::class)->name('login');
//route get user
//route /user dapat di akses jika sudah login
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/user', function () {
        return response()->json([
            'success' => true,
            'user' => JWTAuth::user()
        ]);
    });
});



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
