<?php

use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VehiculeController::class, 'index']);
Route::get('/vehicules', [VehiculeController::class, 'vehicules']);
Route::get('/vehicules/{param}/{value}', [VehiculeController::class, 'filterVehicle']);
Route::get('/vehicules/{vehicule_id}', [VehiculeController::class, 'detailVehicule']);
