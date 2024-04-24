<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'kode_prodi',
        'tahun_akademik',
        'jalur',
        'kk',
        'ktp',
        'ijazah',
        'transkip',
        'bukti_tf',
    ];

    // Relasi dengan model Profile
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    // Relasi dengan model Prody
    public function prodie()
    {
        return $this->hasMany(Prodie::class, 'kode_prodi');
    }
}
