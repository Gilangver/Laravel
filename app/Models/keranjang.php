<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    protected $fielable = [
        'id',
        'user_id',
        'barang_id',
        'qty',
        'subtotal',
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
