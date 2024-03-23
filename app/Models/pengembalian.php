<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;
    protected $fielable = [
        'id_pengembalian',
        'no_faktur',
        'tanggal',
    ];
}
