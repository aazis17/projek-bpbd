<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kunjungan')->unique(); // Tanggal kunjungan (unik)
            $table->time('waktu_kunjungan'); // Waktu kunjungan
            $table->boolean('is_available')->default(true); // Status ketersediaan jadwal
            $table->timestamps();
        });
    }
};
