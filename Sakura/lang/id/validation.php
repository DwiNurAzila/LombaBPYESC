<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'accepted' => ':attribute harus disetujui.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus berisi tanggal setelah :date.',
    'alpha' => ':attribute hanya boleh berisi huruf.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
    'array' => ':attribute harus berupa array.',
    'before' => ':attribute harus berisi tanggal sebelum :date.',
    'between' => [
        'numeric' => ':attribute harus bernilai antara :min dan :max.',
        'file' => ':attribute harus berukuran antara :min dan :max kilobyte.',
        'string' => ':attribute harus berisi antara :min dan :max karakter.',
        'array' => ':attribute harus memiliki antara :min dan :max item.',
    ],
    'boolean' => ':attribute harus bernilai true atau false.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_format' => ':attribute tidak cocok dengan format :format.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus terdiri dari :digits angka.',
    'digits_between' => ':attribute harus terdiri antara :min dan :max angka.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute harus berupa file.',
    'filled' => ':attribute wajib diisi.',
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'ip' => ':attribute harus berupa alamat IP yang valid.',
    'max' => [
        'numeric' => ':attribute maksimal :max.',
        'file' => ':attribute maksimal :max kilobyte.',
        'string' => ':attribute maksimal :max karakter.',
        'array' => ':attribute maksimal memiliki :max item.',
    ],
    'mimes' => ':attribute harus berupa file bertipe: :values.',
    'min' => [
        'numeric' => ':attribute minimal :min.',
        'file' => ':attribute minimal :min kilobyte.',
        'string' => ':attribute minimal :min karakter.',
        'array' => ':attribute minimal memiliki :min item.',
    ],
    'not_in' => ':attribute yang dipilih tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => ':attribute wajib diisi.',
    'required_if' => ':attribute wajib diisi bila :other adalah :value.',
    'required_with' => ':attribute wajib diisi bila terdapat :values.',
    'required_without' => ':attribute wajib diisi bila tidak terdapat :values.',
    'same' => ':attribute dan :other harus sama.',
    'size' => [
        'numeric' => ':attribute harus berukuran :size.',
        'file' => ':attribute harus berukuran :size kilobyte.',
        'string' => ':attribute harus berukuran :size karakter.',
        'array' => ':attribute harus berisi :size item.',
    ],
    'string' => ':attribute harus berupa string.',
    'unique' => ':attribute sudah digunakan.',
    'url' => 'Format :attribute tidak valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */
    'attributes' => [
        'login' => 'Email / Nomor WhatsApp',
        'email' => 'Alamat Email',
        'password' => 'Kata Sandi',
        'names' => 'Nama Anda & Pasangan',
        'name' => 'Nama',
        'whatsapp' => 'Nomor WhatsApp',
        'position' => 'Jabatan',
        'event_date' => 'Estimasi Bulan/Tahun Acara',
    ],
];