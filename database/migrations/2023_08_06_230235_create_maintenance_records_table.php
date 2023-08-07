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
        Schema::create('maintenance_records', function (Blueprint $table) {

            $table->id();
            $table->foreignId('vehicle_id')->constrained();
            $table->string('activity');
            $table->date('date');
            $table->date('last_oil_change_date')->nullable();
            $table->date('last_filter_change_date')->nullable();
            $table->date('last_air_filter_change_date')->nullable();
            
            $table->date('last_fuel_filter_change_date')->nullable();

            $table->date('last_transmission_oil_change_date')->nullable();

            $table->date('last_differential_oil_change_date')->nullable();

            $table->date('last_grease_date')->nullable();

            $table->date('last_brake_fluid_change_date')->nullable();

            $table->date('last_rotation_balance_date')->nullable();
            // Otros campos de mantenimiento si es necesario
            $table->timestamps();
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_records');
    }
};
