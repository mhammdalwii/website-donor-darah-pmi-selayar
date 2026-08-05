<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilPmi extends Model
{
    use HasFactory;

    protected $fillable = [
        'visi',
        'misi',
        'gambar_struktur',
    ];

    protected $casts = [
        'gambar_struktur' => 'array',
    ];
}
