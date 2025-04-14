<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            VehiculeTypeSeeder::class,
            EquipmentSeeder::class,
            VehiculeSeeder::class,
            VehiculePhotoSeeder::class,
            VehiculeEquipmentSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}
