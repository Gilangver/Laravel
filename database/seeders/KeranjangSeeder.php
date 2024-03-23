<?php

namespace Database\Seeders;

use App\Models\keranjang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $databarang = [
            [
                'barang_id' => '11',
                'pelanggan_id' => '11',
            ], [
                'barang_id' => '22',
                'pelanggan_id' => '22',
            ], [
                'barang_id' => '33',
                'pelanggan_id' => '33',
            ]

        ];
        foreach ($databarang as $key => $val) {
            keranjang::create($val);
        }
    }
}
