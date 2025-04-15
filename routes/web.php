<?php

use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VehiculeController::class, 'index']);
Route::get('filterHome', [VehiculeController::class, 'filterHome']);

Route::get('/vehicules', [VehiculeController::class, 'vehicules']);

Route::get('/vehicules/{id}/reservation', [VehiculeController::class, 'rentCar'])->name('rent-car');
Route::post('/vehicules/{id}/reservation', [VehiculeController::class, 'store']);

Route::get('/vehicules/{id}', [VehiculeController::class, 'detailVehicule']);
Route::get('/vehicules/{param}/{value}', [VehiculeController::class, 'filterVehicle']);
