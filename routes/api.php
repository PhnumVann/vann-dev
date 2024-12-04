<?php

use App\Enums\RentalStatus;
use App\Enums\SystemPermission;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\MaintenanceController;
use App\Http\Controllers\Api\RentalController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//User Authentication
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

//    Api for testing product
    Route::apiResource('products', ProductController::class);
    Route::apiResource('invoices', InvoiceController::class);

//  Api for Car
    Route::apiResource('cars', CarController::class);
    Route::apiResource('rentals', RentalController::class);
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('maintenances', MaintenanceController::class);

//    Route::get('/cars', [CarController::class, 'index'])->middleware('permissions:'.SystemPermission::viewCar->value);
//    Route::post('/cars', [CarController::class, 'store'])->middleware('permissions:'.SystemPermission::createCar->value);
//    Route::put('/cars/{id}', [CarController::class, 'update'])->middleware('permissions:'.SystemPermission::updateCar->value);
//    Route::delete('/cars', [CarController::class, 'destroy'])->middleware('permissions:'.SystemPermission::deleteCar->value);

//    Route::get('/rentals', [RentalController::class, 'index'])->middleware('permissions:'.SystemPermission::viewRental->value);
//    Route::post('/rentals', [RentalController::class, 'store'])->middleware('permissions:'.SystemPermission::createRental->value);
//    Route::put('/rentals/{id}', [RentalController::class, 'update'])->middleware('permissions:'.SystemPermission::updateRental->value);
//    Route::delete('/rentals/{id}', [RentalController::class, 'destroy'])->middleware('permissions:'.SystemPermission::deleteRental->value);

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

