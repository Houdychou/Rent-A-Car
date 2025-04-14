<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculeTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehicule_types')->insert([
            ['name' => 'sedan'],
            ['name' => 'minivan'],
            ['name' => 'suv'],
            ['name' => 'crossover'],
            ['name' => 'pickup'],
            ['name' => 'cabriolet'],
        ]);
    }
}
