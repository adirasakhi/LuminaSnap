<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
                'name' => 'admin ',
                'email' => 'admin'.'@example.com',
                'password' => Hash::make('password123'), // password default
                'bio' => 'This Admin',
                'profile_photo' => null,
                'role' => 'admin', // kalau punya field role di tabel
            ]);

        foreach (range(1, 10) as $i) {
            User::create([
                'name' => 'User '.$i,
                'email' => 'user'.$i.'@example.com',
                'password' => Hash::make('password123'), // password default
                'bio' => 'This is user '.$i,
                'profile_photo' => null,
                'role' => 'user', // kalau punya field role di tabel
            ]);
        }
    }
}
