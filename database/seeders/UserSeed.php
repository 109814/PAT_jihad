<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manajer = User::create([
            'nik' => '12345',
            'name' => 'jfn',
            'email' => 'manajer@gmail.com',
            'password' => bcrypt('12345678'),
            'no_hp' => '0821342134'
        ]);
        $manajer->assignRole('manajer');

        $admin = User::create([
            'nik' => '123456',
            'name' => 'jfnn',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'no_hp' => '0821342134'
        ]);
        $admin->assignRole('admin');

        $kasir = User::create([
            'nik' => '1234545',
            'name' => 'jfn',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('12345678'),
            'no_hp' => '0821342134'
        ]);
        $kasir->assignRole('kasir');
    }
}
