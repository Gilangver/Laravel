<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fielable = [
        'id',
        'user_id',
        'tanggal',
        'total',
        'status',
        'catatan',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
