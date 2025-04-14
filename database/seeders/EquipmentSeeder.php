<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipment')->insert([
            ['name' => 'GPS'],
            ['name' => 'Bluetooth'],
            ['name' => 'Sièges chauffants'],
            ['name' => 'Caméra de recul'],
            ['name' => 'Toit ouvrant'],
        ]);
    }
}
