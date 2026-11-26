<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VendorPackageController extends Controller
{
    /**
     * Menampilkan daftar semua paket milik vendor yang sedang login.
     */
    public function index()
    {
        $vendor = auth()->user()->vendor;
        $packages = $vendor->packages()->latest()->get();
        
        return view('vendor.packages.index', compact('packages'));
    }

    /**
     * Menampilkan form untuk membuat paket baru.
     */
    public function create()
    {
        // Cek otorisasi menggunakan Policy
        Gate::authorize('create', Package::class);
        
        return view('vendor.packages.create');
    }

    /**
     * Menyimpan paket baru ke database.
     */
    public function store(StorePackageRequest $request)
    {
        $vendor = auth()->user()->vendor;

        $vendor->packages()->create([
            'name' => $request->name,
            'description' => $request->description,
            'base_price' => $request->base_price,
            'guest_capacity' => $request->guest_capacity,
            'duration_hours' => $request->duration_hours,
            'location' => $request->location,
            // Karena checkbox HTML hanya mengirim nilai jika dicentang, kita pakai has() atau boolean
            'has_catering' => $request->boolean('has_catering'),
            'has_decoration' => $request->boolean('has_decoration'),
            'has_documentation' => $request->boolean('has_documentation'),
        ]);

        return redirect()->route('vendor.packages.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit paket.
     */
    public function edit(Package $package)
    {
        // Cek otorisasi menggunakan Policy (Apakah ini paket miliknya?)
        Gate::authorize('update', $package);

        return view('vendor.packages.edit', compact('package'));
    }

    /**
     * Menyimpan perubahan paket ke database.
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        // Otorisasi sudah otomatis dicek oleh UpdatePackageRequest (authorize method)
        // Tapi untuk memastikan, kita panggil Gate juga
        Gate::authorize('update', $package);

        $package->update([
            'name' => $request->name,
            'description' => $request->description,
            'base_price' => $request->base_price,
            'guest_capacity' => $request->guest_capacity,
            'duration_hours' => $request->duration_hours,
            'location' => $request->location,
            'has_catering' => $request->boolean('has_catering'),
            'has_decoration' => $request->boolean('has_decoration'),
            'has_documentation' => $request->boolean('has_documentation'),
        ]);

        return redirect()->route('vendor.packages.index')->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Menghapus paket dari database.
     */
    public function destroy(Package $package)
    {
        // Cek otorisasi
        Gate::authorize('delete', $package);

        $package->delete();

        return redirect()->route('vendor.packages.index')->with('success', 'Paket berhasil dihapus.');
    }
}