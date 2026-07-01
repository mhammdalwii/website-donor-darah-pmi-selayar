<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendonor extends Model
{
    // Menggunakan fillable untuk mengizinkan kolom-kolom ini disimpan
    protected $fillable = [
        'nik', // pastikan NIK juga dimasukkan jika ada di database
        'nama_lengkap',
        'golongan_darah',
        'nomor_telepon',
        'tanggal_donor_terakhir',
        'alamat'
    ];
}
