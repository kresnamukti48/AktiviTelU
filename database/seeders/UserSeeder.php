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

        $user2 = User::FirstOrNew([
            'name' => 'Dummy 1',
            'no_telepon' => '123456789',
            'jenis_kelamin' => 'Laki-Laki',
            'email' => 'dummy1@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $user2->save();

        $user3 = User::FirstOrNew([
            'name' => 'Dummy 2',
            'no_telepon' => '123456789',
            'jenis_kelamin' => 'Laki-Laki',
            'email' => 'dummy2@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $user3->save();

        $user4 = User::FirstOrNew([
            'name' => 'Dummy 3',
            'no_telepon' => '123456789',
            'jenis_kelamin' => 'Laki-Laki',
            'email' => 'dummy3@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $user4->save();
    }
}
