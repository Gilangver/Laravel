<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengembalian extends Model
{
    use HasFactory;
    protected $fielable = [
        'id_detail_pengembalian',
        'id_pengembalian',
        'id_barang',
        'catatan',
        'qty',
    ];
}
