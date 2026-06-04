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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            // Foreign Keys
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            
            // Optional location (nullable allows for remote/online requests)
            $table->foreignId('location_id')->nullable()->constrained()->onDelete('set null');
            
            // Request Details
            $table->string('title');
            $table->text('description');
            
            // Budget Range
            $table->decimal('budget_min', 10, 2)->nullable();
            $table->decimal('budget_max', 10, 2)->nullable();
            
            // Request Status
            $table->enum('status', ['open', 'closed', 'assigned'])->default('open');
            
            $table->timestamps();
            $table->index('location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
