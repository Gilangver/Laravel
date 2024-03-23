<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fielable = [
        'id_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok',
        'foto',
    ];

    public function keranjang()
    {
        return $this->hasMany(keranjang::class);
    }
}
