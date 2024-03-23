<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
    protected $fielable = [
        'id_detail_transaksi',
        'no_faktur',
        'id_barang',
        'qty',
        'subtotal',
    ];
}
