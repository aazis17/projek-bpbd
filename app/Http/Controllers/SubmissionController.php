<?php
// app/Http/Controllers/SubmissionController.php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'tanggal_kunjungan' => 'required|date|after:today',
        'waktu_kunjungan' => 'required',
        'instansi' => 'required|string|max:255',
        'jenis_instansi' => 'required|string',
        'alamat' => 'required|string',
        'nama_pj' => 'required|string|max:255',
        'jabatan_pj' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email',
        'jumlah_peserta' => 'required|integer|min:1',
        'tujuan_kunjungan' => 'required|string',
        'surat_permohonan' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    try {
        // Handle file upload
        if ($request->hasFile('surat_permohonan')) {
            $path = $request->file('surat_permohonan')->store('surat-permohonan', 'public');
            $validatedData['surat_permohonan'] = $path;
        }

        // Hapus terms dari validated data karena tidak ada di table
        unset($validatedData['terms']);

        // Simpan ke database
        Submission::create($validatedData);

        return redirect()->back()->with('success', 'Pengajuan kunjungan berhasil dikirim!');
    } catch (\Exception $e) {
        // Log error untuk debugging
        Log::error('Submission Error: ' . $e->getMessage());
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan. Silakan coba lagi.')
            ->withInput();
    }
}
}