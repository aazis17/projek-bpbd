<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    use App\Models\Schedule;

// Ambil data waktu kunjungan yang tersedia berdasarkan tanggal
$tanggalKunjungan = $request->input('tanggal_kunjungan');
$waktuKunjunganOptions = Schedule::where('tanggal_kunjungan', $tanggalKunjungan)
    ->where('is_available', true)
    ->get();
}
