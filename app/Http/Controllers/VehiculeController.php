<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\VehiculeType;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    function index() {
        $typeVehicules = VehiculeType::query()
            ->select('id', 'name')
            ->groupBy('name')
            ->get();

        $fuelTypes = Vehicule::query()
            ->select( 'fuel_type')
            ->groupBy('fuel_type')
            ->get();

        $allVehicules = Vehicule::query()->select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")->join("vehicule_photos" , "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->orderBy("vehicules.id", "ASC")
            ->limit(6)
            ->get();

        $gearType = Vehicule::query()
            ->select('transmission')
            ->groupBy('transmission')
            ->get();

        return view('home', ["vehicules" => $allVehicules, "typeVehicules" => $typeVehicules, "fuelTypes" => $fuelTypes, "gearType" => $gearType]);
    }
}
