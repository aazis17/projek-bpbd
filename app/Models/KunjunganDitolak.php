<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KunjunganDitolak extends Model
{
    //
    public function submission()
    {
        return $this->belongsTo(Submission::class,'id');
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


}
