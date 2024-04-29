<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appendix extends Model
{
    use HasFactory;

    protected  $fillable = [
        'registration_id',
        'kk',
        'ktp',
        'ijazah',
        'transkip',
        'bukti_tf',
    ];

    // Relasi dengan model Registration
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
