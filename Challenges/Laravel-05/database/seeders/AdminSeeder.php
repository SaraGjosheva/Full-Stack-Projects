<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Sara',
            'email' => 'sara@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Sara12345'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => null,
        ]);
    }
}
