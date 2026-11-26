<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade');
            
            // Kolom wajib
            $table->string('name');
            $table->text('description');
            
            // Kolom terstruktur untuk perbandingan (Kalkulator)
            $table->integer('base_price'); 
            $table->integer('guest_capacity');
            $table->integer('duration_hours');
            $table->string('location'); // Contoh: "Jakarta", "Bandung"
            
            // Kolom Boolean (Fasilitas)
            $table->boolean('has_catering')->default(false);
            $table->boolean('has_decoration')->default(false);
            $table->boolean('has_documentation')->default(false);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};