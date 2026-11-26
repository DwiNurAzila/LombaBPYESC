<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'base_price',
        'guest_capacity',
        'duration_hours',
        'location',
        'has_catering',
        'has_decoration',
        'has_documentation',
    ];

    // Casting boolean agar otomatis jadi true/false di Laravel
    protected $casts = [
        'has_catering' => 'boolean',
        'has_decoration' => 'boolean',
        'has_documentation' => 'boolean',
    ];

    // Relasi: Package milik satu Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    // Relasi: Package punya banyak foto di Gallery
    public function galleries()
    {
        return $this->hasMany(PackageGallery::class);
    }

    // Relasi: Package bisa dipesan berkali-kali di tabel Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}