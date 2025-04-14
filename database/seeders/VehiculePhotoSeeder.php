<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculePhotoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehicule_photos')->insert([
            ['vehicule_id' => 1, 'image_url' => 'images/toyota_corolla_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 2, 'image_url' => 'images/honda_odyssey_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 3, 'image_url' => 'images/jeep_wrangler_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 4, 'image_url' => 'images/mazda_cx5_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 5, 'image_url' => 'images/ford_f150_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 6, 'image_url' => 'images/bmw_4series_cab_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 7, 'image_url' => 'images/hyundai_tucson_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 8, 'image_url' => 'images/mercedes_eclass_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 9, 'image_url' => 'images/vw_multivan_1.jpg', 'display_order' => 0],
        ]);
    }
}
