<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        $admin->assignRole('admin');

        $siswa = User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('student'),
        ]);
        $siswa->assignRole('user');
    }
}
