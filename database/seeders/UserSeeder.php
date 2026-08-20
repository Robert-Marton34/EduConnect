<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Subject;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'Mr. Smith',
            'email' => 'smith@example.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        User::create([
            'name' => 'Ms. Johnson',
            'email' => 'johnson@example.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);
    }
}
