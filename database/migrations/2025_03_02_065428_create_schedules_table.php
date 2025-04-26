<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kunjungan'); // Tambahkan kolom tanggal_kunjungan
            $table->time('waktu_kunjungan'); // Kolom untuk menyimpan waktu kunjungan
            $table->boolean('is_available')->default(true); // Ubah is_active menjadi is_available
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}