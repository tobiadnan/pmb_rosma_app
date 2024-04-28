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
        'tgl_registration',
        'is_verif',
        'is_set',
    ];

    // Relasi dengan model Profile
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // Relasi dengan model Prody
    public function prodie()
    {
        return $this->hasMany(Prodie::class, 'kode_prodi');
    }

    // Relasi dengan model Appendix
    public function appendix()
    {
        return $this->hasOne(Appendix::class);
    }
}
