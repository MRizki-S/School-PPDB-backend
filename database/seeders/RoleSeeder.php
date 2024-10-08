<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // untuk mengkosongkan data yang ada pada table dan mengisi kembali
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Admin Sekolah', 'User', 'Guru'
        ];

        foreach($data as $item) {
            Role::insert([
                'name' => $item,
            ]);
        };
    }
}
