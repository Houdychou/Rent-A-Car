<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\VehiculeType;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $typeVehicules = VehiculeType::query()
            ->select('id', 'name')
            ->groupBy('name')
            ->get();

        $fuelTypes = Vehicule::query()
            ->select('fuel_type')
            ->groupBy('fuel_type')
            ->get();

        $vehicules = Vehicule::query()->select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->orderBy("vehicules.id", "ASC")
            ->limit(6)
            ->get();

        $gearType = Vehicule::query()
            ->select('transmission')
            ->groupBy('transmission')
            ->get();

        return view('home', ["vehicules" => $vehicules, "typeVehicules" => $typeVehicules, "fuelTypes" => $fuelTypes, "gearType" => $gearType]);
    }

    public function vehicules()
    {
        $typeVehicules = VehiculeType::query()
            ->select('id', 'name')
            ->groupBy('name')
            ->get();

        $fuelTypes = Vehicule::query()
            ->select('fuel_type')
            ->groupBy('fuel_type')
            ->get();

        $vehicules = Vehicule::query()->select("vehicules.id", "vehicules.air_conditioning", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->orderBy("vehicules.id", "ASC")
            ->get();

        $gearType = Vehicule::query()
            ->select('transmission')
            ->groupBy('transmission')
            ->get();

        return view('vehicule', ["vehicules" => $vehicules, "fuelTypes" => $fuelTypes, "gearType" => $gearType, "typeVehicules" => $typeVehicules]);
    }

    public function filterVehicle($param, $value)
    {
        if ($param === "type") {
            $vehicules = Vehicule::query()->select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
                ->orderBy("vehicules.id", "ASC")
                ->where("vehicule_types.name", $value)
                ->get();
        } else if ($param === "energy") {
            $vehicules = Vehicule::query()->select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
                ->orderBy("vehicules.id", "ASC")
                ->where("vehicules.fuel_type", $value)
                ->get();
        } else if ($param === "gear") {
            $vehicules = Vehicule::query()->select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
                ->orderBy("vehicules.id", "ASC")
                ->where("vehicules.transmission", $value)
                ->get();
        }

        $typeVehicules = VehiculeType::select('id', 'name')->groupBy('name')->get();
        $fuelTypes = Vehicule::select('fuel_type')->groupBy('fuel_type')->get();
        $gearType = Vehicule::select('transmission')->groupBy('transmission')->get();

        if (request()->ajax()) {
            return response()->json($vehicules);
        }

        return view('vehicule', ["vehicules" => $vehicules, "typeVehicules" => $typeVehicules, "fuelTypes" => $fuelTypes, "gearType" => $gearType]);
    }

    public function detailVehicule($id) {
        $vehicules = Vehicule::query()->findOrFail($id)->select("vehicules.id", "vehicules.air_conditioning", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->orderBy("vehicules.id", "ASC")
            ->get();
        return view("vehicle-details", ["vehicules" => $vehicules]);
    }
}
