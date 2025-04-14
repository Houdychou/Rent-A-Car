<?php

use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VehiculeController::class, 'index']);

Route::get('/vehicules', [VehiculeController::class, 'vehicules']);
Route::get('/vehicules/{vehicule_id}/reservation', [VehiculeController::class, 'rentCar']);
Route::get('/vehicules/{vehicule_id}', [VehiculeController::class, 'detailVehicule']);
Route::get('/vehicules/{param}/{value}', [VehiculeController::class, 'filterVehicle']);
