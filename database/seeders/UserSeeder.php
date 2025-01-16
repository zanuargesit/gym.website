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
        User::create(
            [
                'username' => 'user',
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => '12345678',
                'no_telepon' => '0813123123',
                'role' => 'user',
            ]
        );

        User::create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'no_telepon' => '0813123123',
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'trainer',
            'name' => 'trainer',
            'email' => 'trainer@gmail.com',
            'password' => '12345678',
            'no_telepon' => '0813123123',
            'role' => 'trainer',
        ]);
        User::create([
            'username' => 'budi',
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => '12345678',
            'no_telepon' => '0813123123',
            'role' => 'user',
        ]);
    }
}
