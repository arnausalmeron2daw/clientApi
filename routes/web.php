<?php


use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');


Route::post('/register', [RegisterController::class, 'reg'])->name('register.reg');


Route::post('/auth', [AuthController::class, 'auth'])->name('auth.auth');


Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::post('/provider', [ProviderController::class, 'store'])->name('provider.store');
Route::get('/provider', [ProviderController::class, 'index'])->name('provider.index');
Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('provider.show');
Route::put('/provider/{id}', [ProviderController::class, 'update'])->name('provider.update');
Route::delete('/provider/{id}', [ProviderController::class, 'destroy'])->name('provider.destroy');

