<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'whatsapp',
        'role',
        'couple_name',
        'event_date',
        'position',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ==========================================
    // RELASI ANTAR TABEL
    // ==========================================

    /**
     * Relasi untuk Vendor (One-to-One).
     * Hanya user dengan role 'vendor' yang memiliki data di sini.
     */
    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    /**
     * Relasi untuk Pengantin (One-to-Many).
     * User (pengantin) bisa melakukan banyak booking.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}