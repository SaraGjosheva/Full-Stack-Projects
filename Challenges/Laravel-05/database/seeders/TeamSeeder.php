<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        // $faker = Faker::create();

        // // create 10 teams
        // for ($i = 0; $i < 10; $i++) {
        //     Team::create([
        //         'name'         => $faker->unique()->company,
        //         'founded_year' => $faker->numberBetween(1800, date('Y')),
        //     ]);
        // }
    }
}
