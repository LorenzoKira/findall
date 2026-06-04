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
        Schema::create('services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            // Foreign Key to users table (aliased as provider_id)
            $table->foreignId('provider_id')->constrained('users')->onDelete('cascade');
            
            // Service details
            $table->string('title');
            $table->text('description');
            
            // Foreign Key to a categories table 
            $table->foreignId('category_id')->constrained()->onDelete('restrict'); // prevents mass service delete
            
            // Pricing configuration
            $table->enum('price_type', ['fixed', 'hourly', 'quote']);
            $table->decimal('price', 10, 2)->nullable(); // Nullable because 'quote' might not have a fixed price
            
            // Status flag
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
            $table->index('category_id');
            $table->index('provider_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
