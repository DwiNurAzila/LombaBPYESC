<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // Relasi ke user (Pengantin) yang memesan
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Relasi ke paket yang dipesan
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
            
            $table->date('booking_date');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->integer('total_price'); // Harga final saat disepakati
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};