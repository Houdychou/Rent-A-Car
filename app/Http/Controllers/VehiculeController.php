<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Vehicule;
use App\Models\VehiculeAvailability;
use App\Models\VehiculeType;
use Illuminate\Http\Request;
use DateTime;

class VehiculeController extends Controller
{
    public function index()
    {
        $typeVehicules = VehiculeType::select('id', 'name')
            ->groupBy('name')
            ->get();

        $fuelTypes = Vehicule::select('fuel_type')
            ->groupBy('fuel_type')
            ->get();

        $vehicules = Vehicule::select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")
            ->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")
            ->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicule_photos.display_order", "=", 0)
            ->orderBy("vehicules.id", "ASC")
            ->limit(6)
            ->get();

        $gearType = Vehicule::select('transmission')
            ->groupBy('transmission')
            ->get();

        return view('home', ["vehicules" => $vehicules, "typeVehicules" => $typeVehicules, "fuelTypes" => $fuelTypes, "gearType" => $gearType]);
    }

    public function vehicules()
    {
        $typeVehicules = VehiculeType::select('id', 'name')
            ->groupBy('name')
            ->get();

        $fuelTypes = Vehicule::select('fuel_type')
            ->groupBy('fuel_type')
            ->get();

        $vehicules = Vehicule::select("vehicules.id", "vehicules.air_conditioning", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")
            ->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")
            ->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicule_photos.display_order", "=", 0)
            ->orderBy("vehicules.id", "ASC")
            ->get();

        $gearType = Vehicule::select('transmission')
            ->groupBy('transmission')
            ->get();

        return view('vehicle', ["vehicules" => $vehicules, "fuelTypes" => $fuelTypes, "gearType" => $gearType, "typeVehicules" => $typeVehicules]);
    }

    public function filterVehicle($param, $value)
    {
        if ($param === "type") {
            $vehicules = Vehicule::select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")
                ->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")
                ->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
                ->where("vehicule_types.name", $value)
                ->where("vehicule_photos.display_order", "=", 0)
                ->orderBy("vehicules.id", "ASC")
                ->get();
        } else if ($param === "energy") {
            $vehicules = Vehicule::select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")
                ->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")
                ->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
                ->where("vehicules.fuel_type", $value)
                ->where("vehicule_photos.display_order", "=", 0)
                ->orderBy("vehicules.id", "ASC")
                ->get();
        } else if ($param === "gear") {
            $vehicules = Vehicule::select("vehicules.id", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")
                ->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")
                ->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
                ->where("vehicules.transmission", $value)
                ->where("vehicule_photos.display_order", "=", 0)
                ->orderBy("vehicules.id", "ASC")
                ->get();
        }

        $typeVehicules = VehiculeType::select('id', 'name')
            ->groupBy('name')
            ->get();
        $fuelTypes = Vehicule::select('fuel_type')
            ->groupBy('fuel_type')
            ->get();
        $gearType = Vehicule::select('transmission')
            ->groupBy('transmission')
            ->get();

        if (request()->ajax()) {
            return response()->json($vehicules);
        }

        return view('vehicle', ["vehicules" => $vehicules, "typeVehicules" => $typeVehicules, "fuelTypes" => $fuelTypes, "gearType" => $gearType]);
    }

    public function detailVehicule($id)
    {
        $vehicule = Vehicule::select("vehicules.*", "vehicule_types.name", "vehicule_photos.image_url")
            ->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")
            ->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicules.id", $id)
            ->where("vehicule_photos.display_order", "=", 0)
            ->firstOrFail();

        $allVehicules = Vehicule::select("vehicules.id", "vehicules.air_conditioning", "vehicules.transmission", "vehicule_types.name", "vehicule_photos.image_url", "vehicules.price_per_day", "vehicules.brand", "vehicules.model", "vehicules.fuel_type")
            ->join("vehicule_types", "vehicule_types.id", "=", "vehicules.vehicule_type_id")
            ->join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicules.id", "!=", $id)
            ->where("vehicule_photos.display_order", "=", 0)
            ->orderBy("vehicules.id", "ASC")
            ->get();

        $carousel = Vehicule::join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicules.id", "=", $id)
            ->get();

        $equipement = Vehicule::select("equipment.name")
            ->join("vehicule_equipment", "vehicules.id", "=", "vehicule_equipment.vehicule_id")
            ->join("equipment", "vehicule_equipment.equipment_id", "=", "equipment.id")
            ->groupBy("equipment.name")
            ->where("vehicules.id", "=", $id)
            ->get();

        return view("vehicle-details", ["specificVehicule" => $vehicule, "vehicules" => $allVehicules, "carousel" => $carousel, "equipments" => $equipement]);
    }

    public function rentCar($id)
    {
        $vehicule = Vehicule::join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicules.id", $id)
            ->where("vehicule_photos.display_order", "=", 0)
            ->firstOrFail();

        $carousel = Vehicule::join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicules.id", "=", $id)
            ->get();

        $reservedDates = Reservation::where("vehicule_id", $id)
            ->select("start_date", "end_date")
            ->get()
            ->toArray();

        return view("rent-car", ["specificVehicule" => $vehicule, "carousel" => $carousel, "reservedDates" => $reservedDates]);
    }

    public function store(Request $request, $id)
    {
        $data = $request->validate([
            "startDate" => ["required", "date_format:Y-m-d"],
            "endDate" => ["required", "date_format:Y-m-d", "after:startDate"],
            "email" => ["required", "email"],
            "priceDay" => ["required"]
        ]);

        $vehicule = Vehicule::join("vehicule_photos", "vehicules.id", "=", "vehicule_photos.vehicule_id")
            ->where("vehicules.id", $id)
            ->where("vehicule_photos.display_order", "=", 0)
            ->firstOrFail();

        $date1 = new DateTime($data['startDate']);
        $date2 = new DateTime($data['endDate']);

        $interval = $date1->diff($date2);
        $price = $vehicule->price_per_day;

        Reservation::query()
            ->insert([
                "vehicule_id" => $id,
                "email" => $data['email'],
                "start_date" => $data['startDate'],
                "end_date" => $data['endDate'],
                "total_price" => $interval->d * $price,
                "status" => "pending"
            ]);

        VehiculeAvailability::query()
            ->insert([
                "vehicule_id" => $id,
                "start_date" => $data['startDate'],
                "end_date" => $data['endDate'],
                "is_available" => 1
            ]);

        return redirect()->route('rent-car', ['id' => $id])->with('message', "Your reservation has been successfully confirmed. You will receive a confirmation and further details by email.");
    }
}
