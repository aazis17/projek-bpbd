<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            // Informasi Pengajuan
            $table->date('tanggal_kunjungan');
            $table->time('waktu_kunjungan');
            
            // Informasi Instansi
            $table->string('instansi');
            $table->enum('jenis_instansi', ['sekolah', 'universitas', 'pemerintah', 'swasta', 'komunitas']);
            $table->text('alamat');
            
            // Informasi Penanggung Jawab
            $table->string('nama_pj');
            $table->string('jabatan_pj');
            $table->string('phone');
            $table->string('email');
            
            // Informasi Kunjungan
            $table->integer('jumlah_peserta');
            $table->text('tujuan_kunjungan');
            
            // Dokumen Pendukung
            $table->string('surat_permohonan')->nullable();
            
            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('catatan')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
