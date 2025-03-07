<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_kunjungan',
        'waktu_kunjungan',
        'is_available',
    ];

    // Relasi ke tabel submissions (jika diperlukan)
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'tanggal_kunjungan', 'tanggal_kunjungan');
    }
}