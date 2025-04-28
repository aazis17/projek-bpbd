<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Feedback extends Model
{

    protected $table = 'feedback'; // Nama tabel

    protected $fillable = ['nama_lengkap', 'email', 'subjek', 'pesan'];
}