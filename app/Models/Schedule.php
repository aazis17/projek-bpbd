<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_kunjungan', // Tambahkan kolom tanggal_kunjungan
        'waktu_kunjungan',
        'is_available', // Ubah is_active menjadi is_available
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date', // Cast kolom tanggal_kunjungan sebagai date
        'is_available' => 'boolean', // Cast kolom is_available sebagai boolean
    ];
}