<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculeEquipmentTable extends Migration
{
    public function up(): void
    {
        Schema::create('vehicule_equipment', function (Blueprint $table) {
            $table->foreignId('vehicule_id')->constrained('vehicules')->cascadeOnDelete();
            $table->foreignId('equipment_id')->constrained('equipment')->cascadeOnDelete();
            $table->primary(['vehicule_id', 'equipment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicule_equipment');
    }
}
