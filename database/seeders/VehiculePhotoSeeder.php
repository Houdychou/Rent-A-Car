<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculePhotoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vehicule_photos')->insert([
            // Toyota Corolla
            ['vehicule_id' => 1, 'image_url' => 'images/toyota_corolla_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 1, 'image_url' => 'images/toyota_corolla_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 1, 'image_url' => 'images/toyota_corolla_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 1, 'image_url' => 'images/toyota_corolla_4.jpg', 'display_order' => 3],

            // Honda Odyssey
            ['vehicule_id' => 2, 'image_url' => 'images/honda_odyssey_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 2, 'image_url' => 'images/honda_odyssey_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 2, 'image_url' => 'images/honda_odyssey_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 2, 'image_url' => 'images/honda_odyssey_4.jpg', 'display_order' => 3],

            // Jeep Wrangler
            ['vehicule_id' => 3, 'image_url' => 'images/jeep_wrangler_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 3, 'image_url' => 'images/jeep_wrangler_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 3, 'image_url' => 'images/jeep_wrangler_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 3, 'image_url' => 'images/jeep_wrangler_4.jpg', 'display_order' => 3],

            // Mazda CX-5
            ['vehicule_id' => 4, 'image_url' => 'images/mazda_cx5_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 4, 'image_url' => 'images/mazda_cx5_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 4, 'image_url' => 'images/mazda_cx5_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 4, 'image_url' => 'images/mazda_cx5_4.jpg', 'display_order' => 3],

            // Ford F150
            ['vehicule_id' => 5, 'image_url' => 'images/ford_f150_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 5, 'image_url' => 'images/ford_f150_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 5, 'image_url' => 'images/ford_f150_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 5, 'image_url' => 'images/ford_f150_4.jpg', 'display_order' => 3],

            // BMW 4 Series Cab
            ['vehicule_id' => 6, 'image_url' => 'images/bmw_4series_cab_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 6, 'image_url' => 'images/bmw_4series_cab_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 6, 'image_url' => 'images/bmw_4series_cab_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 6, 'image_url' => 'images/bmw_4series_cab_4.jpg', 'display_order' => 3],

            // Hyundai Tucson
            ['vehicule_id' => 7, 'image_url' => 'images/hyundai_tucson_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 7, 'image_url' => 'images/hyundai_tucson_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 7, 'image_url' => 'images/hyundai_tucson_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 7, 'image_url' => 'images/hyundai_tucson_4.jpg', 'display_order' => 3],

            // Mercedes E-Class
            ['vehicule_id' => 8, 'image_url' => 'images/mercedes_eclass_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 8, 'image_url' => 'images/mercedes_eclass_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 8, 'image_url' => 'images/mercedes_eclass_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 8, 'image_url' => 'images/mercedes_eclass_4.jpg', 'display_order' => 3],

            // VW Multivan
            ['vehicule_id' => 9, 'image_url' => 'images/vw_multivan_1.jpg', 'display_order' => 0],
            ['vehicule_id' => 9, 'image_url' => 'images/vw_multivan_2.jpg', 'display_order' => 1],
            ['vehicule_id' => 9, 'image_url' => 'images/vw_multivan_3.jpg', 'display_order' => 2],
            ['vehicule_id' => 9, 'image_url' => 'images/vw_multivan_4.jpg', 'display_order' => 3],
        ]);
    }
}
