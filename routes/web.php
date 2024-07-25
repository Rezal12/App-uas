<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;

use App\Http\Controllers\Api\BookApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\SupplierApiController;

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/categories', CategoryController::class);
});

Route::apiResource('/books-api', BookApiController::class);
Route::apiResource('/categories-api', CategoryApiController::class);
Route::apiResource('/suppliers-api', SupplierApiController::class);


require __DIR__ . '/auth.php';
