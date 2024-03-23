<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'nama',
        'password',
        'telp',
        'prov',
        'kab',
        'kec',
        'detail',
        'foto',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

}
