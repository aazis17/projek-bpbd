<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;
    
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'tanggal_kunjungan', 'tanggal_kunjungan');
    }

    protected $table = 'submissions'; // Nama tabel
    
    protected $fillable = [
        'tanggal_kunjungan',
        'waktu_kunjungan',
        'instansi',
        'jenis_instansi',
        'alamat',
        'nama_pj',
        'jabatan_pj',
        'phone',
        'email',
        'jumlah_peserta',
        'tujuan_kunjungan',
        'surat_permohonan',
        'status',
        'catatan',
        'schedule_id' // Tambahkan kolom ini
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'waktu_kunjungan' => 'datetime',
        'jumlah_peserta' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($submission) {
            // Update status jadwal menjadi tidak tersedia
            Schedule::where('tanggal_kunjungan', $submission->tanggal_kunjungan)
                ->where('waktu_kunjungan', $submission->waktu_kunjungan)
                ->update(['is_available' => false]);
        });
    }
}