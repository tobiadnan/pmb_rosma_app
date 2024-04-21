<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_d',
        'nama_b',
        'nik',
        'nkk',
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'no_hp',
        'no_hp2',
        'alamat',
        'desa',
        'kecamatan',
        'kota',
        'provinsi',
        'pend_terakhir',
        'no_ijazah',
        'tahun_lulus',
    ];

    protected $hidden = [
        'nik',
        'nkk',
        'no_hp',
        'no_hp2',
        'no_ijazah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
