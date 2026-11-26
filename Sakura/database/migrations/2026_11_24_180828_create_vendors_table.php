<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users (Hanya user dengan role 'vendor' yang punya data di sini)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->string('brand_name');
            $table->text('address');
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};