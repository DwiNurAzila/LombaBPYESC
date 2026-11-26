<?php

namespace App\Models;

use App\Enums\VendorVerificationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand_name',
        'address',
        'description',
        'logo_path',
        'verification_status',
        'ktp_file',
        'selfie_ktp_file',
        'office_photo_file',
        'business_whatsapp',
        'nib',
        'npwp',
        'social_media',
        'rejection_reason',
    ];

    // Casting ke Enum
    protected $casts = [
        'verification_status' => VendorVerificationStatus::class,
    ];

    // Relasi: Vendor milik satu User (Akun)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Vendor punya banyak Package
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    // Helper untuk mengecek apakah vendor sudah terverifikasi
    public function isApproved(): bool
    {
        return $this->verification_status === VendorVerificationStatus::APPROVED;
    }
}