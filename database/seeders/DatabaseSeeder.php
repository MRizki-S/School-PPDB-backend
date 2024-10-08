<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'AdminSekolah',
            'email' => 'adminsmkprima@gmail.com',
            'password' => bcrypt('rahasia45'),
            'role_id' => 1,
            'created_at' => now(),
        ]);
    }
}
