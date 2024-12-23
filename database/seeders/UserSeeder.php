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
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => '12345678',
                'no_telepon' => '0813123123',
                'role' => 'user'
            ]
        );

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'no_telepon' => '0813123123',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'trainer',
            'email' => 'trainer@gmail.com',
            'password' => '12345678',
            'no_telepon' => '0813123123',
            'role' => 'trainer'
        ]);
    }
}
