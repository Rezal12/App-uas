<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\SupplierApiController;

Route::apiResource('/booksapi', BookApiController::class);
Route::apiResource('/categoriesapi', CategoryApiController::class);
Route::apiResource('/suppliersapi', SupplierApiController::class);
