<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'file_path',
        'type',
    ];

    // Relasi: Gallery milik satu Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}