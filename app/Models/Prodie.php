<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodie extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_prodi';
    protected $fillable = [
        'kode_prodi', 'prodi',
    ];


    public function registrations()
    {
        return $this->hasMany(Registration::class, 'kode_prodi');
    }
}
