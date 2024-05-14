<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_test';
    protected $fillable = [
        'no_test',
        'nilai',
        'status',
        'registration_id',
    ];


    public function registrations()
    {
        return $this->hasMany(Registration::class, 'no_test');
    }
}
