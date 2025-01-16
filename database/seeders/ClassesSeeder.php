<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClassesSeeder extends Seeder
{

    public function run(): void
    {
        $trainers = DB::table('users')->where('role', 'trainer')->pluck('id');

        if ($trainers->isEmpty()) {
            $this->command->warn('Tidak ada pengguna dengan role "trainer". Seeder tidak akan dijalankan.');
            return;
        }

        $classes = [
            [
                'name_class' => 'Yoga Beginner',
                'description' => 'Kelas yoga untuk pemula.',
                'trainer_id' => $trainers->random(),
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-20',
                'start_time' => '2025-01-10 09:00:00',
                'end_time' => '2025-01-10 10:00:00',
                'capacity' => 20,
            ],
            [
                'name_class' => 'HIIT Training',
                'description' => 'Pelatihan interval intensitas tinggi.',
                'trainer_id' => $trainers->random(),
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-20',
                'start_time' => '2025-01-15 11:00:00',
                'end_time' => '2025-01-15 12:00:00',
                'capacity' => 15,
            ],
            [
                'name_class' => 'Zumba Dance',
                'description' => 'Kelas tarian zumba yang menyenangkan.',
                'trainer_id' => $trainers->random(),
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-20',
                'start_time' => '2025-01-20 10:00:00',
                'end_time' => '2025-01-20 11:00:00',
                'capacity' => 25,
            ],
            [
                'name_class' => 'Popmie Dance',
                'description' => 'Kelas tarian zumba yang menyenangkan.',
                'trainer_id' => $trainers->random(),
                'start_date' => '2025-01-20 12:00:00',
                'end_date' => '2025-01-20 12:00:00',
                'start_time' => '2025-01-20 12:00:00',
                'end_time' => '2025-01-20 12:30:00',
                'capacity' => 25,
            ],
            [
                'name_class' => 'Wkwk Dance',
                'description' => 'Kelas tarian zumba yang menyenangkan.',
                'trainer_id' => $trainers->random(),
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-20',
                'start_time' => '2025-01-20 20:00:00',
                'end_time' => '2025-01-20 21:00:00',
                'capacity' => 25,
            ],
            [
                'name_class' => 'Joged Dance',
                'description' => 'Kelas tarian zumba yang menyenangkan.',
                'trainer_id' => $trainers->random(),
                'start_date' => '2025-01-20',
                'end_date' => '2025-01-20',
                'start_time' => '2025-01-20 15:00:00',
                'end_time' => '2025-01-20 16:00:00',
                'capacity' => 25,
            ],
        ];


        DB::table('classes')->insert($classes);
    }
}
