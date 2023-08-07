<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {

            $table->id();
            $table->string('license_plate'); // Patente
            $table->string('make'); // Marca
            $table->string('model'); // Modelo
            $table->string('chassis_number'); // Número de Chasis
            // Otros campos del vehículo
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
