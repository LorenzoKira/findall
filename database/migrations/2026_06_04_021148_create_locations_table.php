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
        Schema::create('locations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            // Foreign Key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Address details
            $table->string('city');
            $table->string('region')->nullable(); // regions without regions
            $table->string('country');
            
            // Standard coordinates (useful for standard API payloads)
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            
            // PostGIS Geometry Point (SRID 4326 is standard for GPS lat/long)
            $table->geometry('geom', subtype: 'point', srid: 4326);
            
            $table->timestamps();

            // Spatial index for fast PostGIS proximity queries
            $table->spatialIndex('geom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
