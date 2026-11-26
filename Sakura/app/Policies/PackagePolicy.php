<?php

namespace App\Policies;

use App\Models\Package;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PackagePolicy
{
    /**
     * Menentukan apakah user boleh melihat daftar paket.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'vendor';
    }

    /**
     * Menentukan apakah user boleh membuat paket.
     */
    public function create(User $user): bool
    {
        return $user->role === 'vendor' && $user->vendor && $user->vendor->isApproved();
    }

    /**
     * Menentukan apakah user boleh mengedit paket.
     * PENTING: Hanya pemilik paket (vendor_id sama dengan id vendor user) yang boleh.
     */
    public function update(User $user, Package $package): bool
    {
        return $user->role === 'vendor' && $user->vendor->id === $package->vendor_id;
    }

    /**
     * Menentukan apakah user boleh menghapus paket.
     * PENTING: Hanya pemilik paket yang boleh.
     */
    public function delete(User $user, Package $package): bool
    {
        return $user->role === 'vendor' && $user->vendor->id === $package->vendor_id;
    }
}