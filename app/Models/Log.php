<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'log';
    protected $fillable = [
        'id_user',
        'log'
    ];


    public function tauser()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
