<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Mail\StatusChangedEmail;
use Illuminate\Support\Facades\Mail;

class Submission extends Model
{
    use HasFactory;



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



    // In Submission.php model
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function updateStatus($id)
    {
        $submission = Submission::findOrFail($id);

        // Ubah status pengajuan
        $status = request('status'); // Status baru (approved/rejected)
        $submission->status = $status;
        $submission->save();

        // Kirim email notifikasi
        Mail::to($submission->user->email)->send(new StatusChangedEmail($status, $submission));

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }
}
