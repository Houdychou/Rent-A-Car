<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculeEquipmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehicule_equipment')->insert([
            [ 'vehicule_id' => 1, 'equipment_id' => 1 ],
            [ 'vehicule_id' => 1, 'equipment_id' => 2 ],
            [ 'vehicule_id' => 2, 'equipment_id' => 1 ],
            [ 'vehicule_id' => 2, 'equipment_id' => 4 ],
            [ 'vehicule_id' => 3, 'equipment_id' => 2 ],
            [ 'vehicule_id' => 3, 'equipment_id' => 3 ],
            [ 'vehicule_id' => 4, 'equipment_id' => 1 ],
            [ 'vehicule_id' => 4, 'equipment_id' => 5 ],
            [ 'vehicule_id' => 5, 'equipment_id' => 3 ],
            [ 'vehicule_id' => 5, 'equipment_id' => 4 ],
            [ 'vehicule_id' => 6, 'equipment_id' => 1 ],
            [ 'vehicule_id' => 6, 'equipment_id' => 5 ],
            [ 'vehicule_id' => 7, 'equipment_id' => 2 ],
            [ 'vehicule_id' => 7, 'equipment_id' => 3 ],
            [ 'vehicule_id' => 8, 'equipment_id' => 1 ],
            [ 'vehicule_id' => 8, 'equipment_id' => 4 ],
            [ 'vehicule_id' => 8, 'equipment_id' => 5 ],
            [ 'vehicule_id' => 9, 'equipment_id' => 1 ],
            [ 'vehicule_id' => 9, 'equipment_id' => 2 ],
            [ 'vehicule_id' => 9, 'equipment_id' => 3 ],
        ]);
    }
}
