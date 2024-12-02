<?php

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


});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




//Route::get('testing', function (Request $request) {
//    return 'Testing';
//});
