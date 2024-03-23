<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $databarang = [
            [
                'nama_barang' => 'Semen 45Kg',
                'harga_beli' => '45000',
                'harga_jual' => '50000',
                'stok' => '100',
                'foto' => 'semen.png',
            ],[
                'nama_barang' => 'Gamping 1 Kol T',
                'harga_beli' => '450000',
                'harga_jual' => '500000',
                'stok' => '10',
                'foto' => 'gamping.png',
            ],[
                'nama_barang' => 'Besi 10',
                'harga_beli' => '100000',
                'harga_jual' => '110000',
                'stok' => '100',
                'foto' => 'besi 10.png',
            ]

        ];
        foreach ($databarang as $key => $val) {
            barang::create($val);
        }
    }
}
