<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'jenis',
        'nomor_antrian',
        'tanggal',
    ];

    // Jika Anda membutuhkan custom date format atau relasi, bisa ditambahkan di sini
}
