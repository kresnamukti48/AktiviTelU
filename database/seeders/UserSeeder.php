<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::FirstOrCreate([
            'name' => 'Admin',
            'no_telepon' => '08123456789',
            'jenis_kelamin' => 'Laki-Laki',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),

        ]);

        $user->syncRoles(Role::ROLE_ADMIN);
    }
}
