<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodie extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_prodi', 'prodi',
    ];

    // Relasi dengan model Registration
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'kode_prodi');
    }
}
