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
        'appendix_id',
        'tahun_akademik',
        'jalur',
        'tgl_registration',
        'reg_fee',
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
        return $this->belongsTo(Prodie::class, 'kode_prodi');
    }

    // Relasi dengan model tests
    public function test()
    {
        return $this->belongsTo(Test::class, 'no_test');
    }


    // Relasi dengan model Appendix
    public function appendix()
    {
        return $this->hasOne(Appendix::class);
    }
}
