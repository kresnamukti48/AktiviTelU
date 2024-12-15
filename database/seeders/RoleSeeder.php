<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => Role::ROLE_ADMIN,
        ]);

        Role::firstOrCreate([
            'name' => Role::ROLE_PENGURUS,
        ]);

        Role::firstOrCreate([
            'name' => Role::ROLE_MEMBER,
        ]);
    }
}