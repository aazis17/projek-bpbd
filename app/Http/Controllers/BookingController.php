<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Method untuk menampilkan halaman form
    public function form()
    {
        return view('form'); // Sesuaikan dengan nama view form Anda
    }
}
