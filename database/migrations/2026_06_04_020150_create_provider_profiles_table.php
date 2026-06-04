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
        Schema::create('provider_profiles', function (Blueprint $table) {
            $table->id();
            
            // Foreign Key linking to the users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->text('bio')->nullable();
            $table->string('service'); // string name/category
            $table->string('avatar_url')->nullable(); // image optionnel
            $table->boolean('verified')->default(false);
            
            // Ratings columns
            $table->decimal('avg_rating', 3, 2)->default(0.00); // e.g., 4.50
            $table->unsignedInteger('total_reviews')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_profiles');
    }
};