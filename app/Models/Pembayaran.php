<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'id_transaksi',
        'id_user',
        'amount',
        'status',
    ];


    public function peus()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
