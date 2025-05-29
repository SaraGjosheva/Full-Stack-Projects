<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Sara',
            'email' => 'sara@gmail.com',
            'password' => Hash::make('Sara12345'),
            'role_id' => 1
        ]);
    }
}
