<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// -------- Guest-only (not logged in) --------
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// -------- Authenticated area --------
Route::middleware('auth')->group(function () {
    // Home lists products
    Route::get('/', [ProductController::class, 'index'])->name('home');

    // Products
    Route::get('/products', [ProductController::class, 'create'])->name('products.create');   // add form
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');   // save
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // soft delete

    // Trash / restore / force delete
    Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::post('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('/products/{id}/force', [ProductController::class, 'forceDestroy'])->name('products.forceDestroy');

    // Logout must be POST
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
