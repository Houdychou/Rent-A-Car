<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->year('year');
            $table->decimal('price_per_day', 10, 2);
            $table->unsignedTinyInteger('doors')->nullable();
            $table->enum('fuel_type', ['essence', 'diesel', 'électrique', 'hybride']);
            $table->boolean('air_conditioning')->default(false);
            $table->unsignedTinyInteger('seats')->nullable();
            $table->enum('transmission', ['automatique', 'manuelle']);
            $table->foreignId('vehicule_type_id')->nullable()->constrained('vehicule_types')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
}
