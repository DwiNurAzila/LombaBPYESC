<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            // Status verifikasi (menggunakan string dulu, nanti di-cast ke Enum di Model)
            $table->string('verification_status')->default('pending')->after('logo_path');
            
            // Data Verifikasi (File path disimpan sebagai string)
            $table->string('ktp_file')->nullable()->after('verification_status');
            $table->string('selfie_ktp_file')->nullable()->after('ktp_file');
            $table->string('office_photo_file')->nullable()->after('selfie_ktp_file');
            
            // Data Teks Verifikasi
            $table->string('business_whatsapp')->nullable()->after('office_photo_file');
            $table->string('nib')->nullable()->after('business_whatsapp');
            $table->string('npwp')->nullable()->after('nib');
            $table->string('social_media')->nullable()->after('npwp');
            
            // Alasan Penolakan
            $table->text('rejection_reason')->nullable()->after('social_media');
        });
    }

    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn([
                'verification_status',
                'ktp_file',
                'selfie_ktp_file',
                'office_photo_file',
                'business_whatsapp',
                'nib',
                'npwp',
                'social_media',
                'rejection_reason'
            ]);
        });
    }
};