<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
            'name'=>'Mas Admin',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('12345678')
        ],
        [
            'name'=>'Mas Petugas',
            'email'=>'petugas@gmail.com',
            'role'=>'petugas',
            'password'=>bcrypt('12345678')
        ],
        [
            'name'=>'Mas Pimpinan',
            'email'=>'pimpinan@gmail.com',
            'role'=>'pimpinan',
            'password'=>bcrypt('12345678')
        ],
    ];

    foreach ($userData as $key => $val) {
        User::create($val);
    }

    }
}
