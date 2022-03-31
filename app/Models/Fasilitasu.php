<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitasu extends Model
{
    use HasFactory;
    protected $table = 'fasilitasu';
    protected $fillable = [
        'fasilitas_umum',
    ];
}
