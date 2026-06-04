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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            // Foreign Keys linking to other tables
            $table->foreignId('request_id')->constrained('service_requests')->onDelete('cascade');
            $table->foreignId('provider_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            
            // Optional direct service link (nullable if booking came purely from a request)
            $table->foreignId('service_id')->nullable()->constrained()->onDelete('set null');
            
            // Financials and schedule
            $table->decimal('price_agreed', 10, 2); 
            $table->timestamp('scheduled_at');
            
            // Booking Status Flow
            $table->enum('status', ['pending', 'accepted', 'in_progress', 'completed', 'cancelled'])->default('pending');
            
            $table->timestamps();
            $table->index('provider_id');
            $table->index('client_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
