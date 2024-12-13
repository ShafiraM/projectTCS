<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\katalogController;
use App\Http\Middleware\NoLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\historyController;



Route::get('/', [dashboardController::class, 'index']);

//Katalog
Route::get('/katalog', [katalogController::class, 'index']);

Route::middleware([NoLogin::class])->group(function(){
    //Login
    Route::get('/login', [authController::class, 'index'])->name('login');
    Route::post('/login', [authController::class, 'store']);

    //Register
    Route::get('/register', [authController::class, 'register']);
    Route::post('/register', [authController::class, 'register_proses']);
    

});

Route::middleware(['auth', 'CekLevel:admin'])->group(function(){


    //category
    route::get('/category', [categoryController::class, 'index']);
    
    route::get('/add/category', [categoryController::class, 'add']);
    route::post('/add/category', [categoryController::class, 'addProses']);
    
    route::get('/edit/category/{id}', [categoryController::class, 'edit']);
    route::post('/edit/category/{id}', [categoryController::class, 'editProses']);
    
    route::get('/del/category/{id}', [categoryController::class, 'delete']);

});

Route::middleware(['auth', 'CekLevel:admin'])->group(function(){
    Route::get('/barang', [BarangController::class, 'index']);

    Route::get('/barang/add', [BarangController::class, 'create']);
    Route::post('/barang/add', [BarangController::class, 'store']);

    Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
    Route::post('/barang/edit/{id}', [BarangController::class, 'update']);
    
    Route::get('/barang/{id}', [BarangController::class, 'destroy']);
});

Route::get('/katalog/{id}', [katalogController::class, 'show'])->name('katalog.show');
//logout
Route::get('/logout', [authController::class, 'logout']);

route::controller(pesananController::class)->group(function(){
    Route::get('/pesanan/{id}', [pesananController::class, 'index']);
    Route::post('/pesanan/{id}', [pesananController::class, 'pesanan']);

    Route::get('/check-out', [pesananController::class, 'check_out']);
    route::delete('/check-out/{id}', [pesananController::class, 'delete']);

    route::get('/konfirmasi-check-out', [pesananController::class, 'konfirmasi']);
});

Route::middleware(['auth'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::controller(historyController::class)->group(function(){
    Route::get('/history', [historyController::class, 'index']);
    Route::get('/history/{id}', [historyController::class, 'detail']);

});

    