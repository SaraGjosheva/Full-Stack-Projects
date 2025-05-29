<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'General'],
            ['name' => 'Entertainment'],
            ['name' => 'Sports'],
            ['name' => 'Movies'],
            ['name' => 'Politics'],
            ['name' => 'Cars']
        ]);
    }
}
