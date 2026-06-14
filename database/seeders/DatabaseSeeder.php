<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
        public function run(): void
    {
        // 1. Create Admin
        \App\Models\User::factory()->create([
            'name' => 'Admin Staff',
            'email' => 'admin@iium.edu.my',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        // 2. ADD THIS: Create Facilities
        \App\Models\Facility::create([
            'name' => 'Sayyidina Hamzah Stadium',
            'location' => 'Main Campus, Zone A',
            'category' => 'Stadium'
        ]);

        \App\Models\Facility::create([
            'name' => 'Futsal Court A',
            'location' => 'Sports Complex, Block B',
            'category' => 'Futsal'
        ]);

        \App\Models\Facility::create([
            'name' => 'Badminton Hall',
            'location' => 'Sports Complex, Block C',
            'category' => 'Badminton'
        ]);
    }
}
