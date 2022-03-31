<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'Transaksi';
    protected $fillable = [
        'id_user',
        'id_kamar',
        'type_fasilitas',
        'cek_in',
        'cek_out',
        'status',
        'jumlah_kamar',
    ];

    public function taka()
    {
        return $this->hasOne(Kamar::class, 'id', 'id_kamar');
    }

    public function tafa()
    {
        return $this->hasOne(Fasilitas::class, 'id', 'type_fasilitas');
    }

    public function taus()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

