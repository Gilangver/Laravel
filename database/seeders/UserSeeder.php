<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(2)->create();
        $userData = [
            [
                'nama' => 'Andi Wiliam',
                'password' => '123',
                'telp' => '11111',
                'prov' => 'Yogyakarta',
                'kab' => 'Sleman',
                'kec' => 'Gamping',
                'detail' => 'Dusun. Trini, Desa.Trihanggo',
                'foto' => 'user.png',
                'role' => '1',
            ],
            [
                'nama' => 'Bejo',
                'password' => '123',
                'telp' => '22222',
                'prov' => 'Yogyakarta',
                'kab' => 'Sleman',
                'kec' => 'Gamping',
                'detail' => 'Dusun. Trini, Desa.Trihanggo',
                'foto' => 'user.png',
                'role' => '2',
            ],[
                'nama' => 'Wiliam',
                'password' => '123',
                'telp' => '33333',
                'prov' => 'Yogyakarta',
                'kab' => 'Sleman',
                'kec' => 'Gamping',
                'detail' => 'Dusun. Trini, Desa.Trihanggo',
                'foto' => 'user.png',
                'role' => '3',
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
