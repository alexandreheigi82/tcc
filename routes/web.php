<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');
Route::post('/users', [UserController::class,'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');

Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');
Route::get('/packages/{package}/edit', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/packages/{package}', [PackageController::class, 'update'])->name('packages.update');
Route::delete('/packages/{package}', [PackageController::class, 'destroy'])->name('packages.destroy');

Route::resource('clients', ClientController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/sales/{sale}', [SaleController::class, 'show'])->name('sales.show');
    // Outras rotas protegidas
}); // Certifique-se de fechar o grupo de middleware aqui.
