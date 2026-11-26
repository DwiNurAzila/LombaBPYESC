<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Otorisasi edit/hapus ditangani oleh PackagePolicy, 
        // tapi kita pastikan user adalah vendor yang approved
        return $this->user()->role === 'vendor' && $this->user()->vendor->isApproved();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'guest_capacity' => 'required|integer|min:1',
            'duration_hours' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'has_catering' => 'boolean',
            'has_decoration' => 'boolean',
            'has_documentation' => 'boolean',
        ];
    }
}