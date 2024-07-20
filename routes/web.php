<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\TipeMobilController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    echo "selamat datang di laravel";
});

Route::middleware(['auth'])->group(function() {
    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
    Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
    Route::post('/mobil/simpanData', [MobilController::class, 'store'])->name('mobil.store');
    Route::get('/mobil/{id}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');
    
    Route::get('/merk', [MerkController::class, 'index'])->name('merk.index');
    Route::get('/merk/create', [MerkController::class, 'create'])->name('merk.create');
    Route::post('/merk/simpan-data', [MerkController::class, 'store'])->name('merk.store');
    Route::get('/merk/edit/{id}', [MerkController::class, 'edit'])->name('merk.edit');
    Route::post('/merk/update/{id}', [MerkController::class, 'update'])->name('merk.update');
    Route::get('/merk/delete/{id}', [MerkController::class, 'delete'])->name('merk.delete');
    
    Route::get('/tipemobil', [TipeMobilController::class, 'index'])->name('tipemobil.index');
    Route::get('/tipemobil/create', [TipeMobilController::class, 'create'])->name('tipemobil.create');
    Route::post('/tipemobil/simpan-data', [TipeMobilController::class, 'store'])->name('tipemobil.store');
    Route::get('/tipemobil/edit/{id}', [TipeMobilController::class, 'edit'])->name('tipemobil.edit');
    Route::post('/tipemobil/update/{id}', [TipeMobilController::class, 'update'])->name('tipemobil.update');
    Route::get('/tipemobil/delete/{id}', [TipeMobilController::class, 'delete'])->name('tipemobil.delete');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/proses', [LoginController::class, 'login'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register/proses', [Auth\RegisterController::class, 'register'])->name('register.proses');
