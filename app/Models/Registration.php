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
        'ranking',
        'tgl_registration',
        'reg_fee',
        'pendaftaran_fee',
        'is_verif',
        'is_set',
    ];

    public function getProdiName()
    {
        switch ($this->kode_prodi) {
            case 'RSMTIS1':
                return 'Teknik Informatika';
            case 'RSMSIS1':
                return 'Sistem Informasi';
            case 'RSMMID3':
                return 'Manajemen Informatika';
            case 'RSMKAD3':
                return 'Komputerisasi Akuntansi';
            default:
                return 'Tidak Diketahui';
        }
    }

    public function noReg()
    {
        if ($this->is_verif) {
            return 'PMBRSM/' . date('Y') . '/' . $this->id;
        } else {
            return '-';
        }
    }

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
        return $this->belongsTo(Appendix::class);
    }
}
