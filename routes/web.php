<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang', [BarangController::class, 'create']);    
    Route::delete('/barang', [BarangController::class, 'delete']);
    Route::patch('/barang', [BarangController::class, 'update']);  
    Route::get('/mutasi', [MutasiController::class, 'index']);
    Route::post('/mutasi', [MutasiController::class, 'create']);  
    Route::delete('/mutasi', [MutasiController::class, 'delete']); 
    Route::patch('/mutasi', [MutasiController::class, 'update']); 
    Route::get('/historyByUserId', [MutasiController::class, 'historyByUserId']);
    Route::get('/historyByBarangId', [MutasiController::class, 'historyByBarangId']);  
});



Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

require __DIR__.'/auth.php'; 
