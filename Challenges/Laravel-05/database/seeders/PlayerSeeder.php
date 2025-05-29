<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Player;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        // $faker = Faker::create();
        // $teams = Team::all();

        // foreach ($teams as $team) {
        //     // each team gets between 11 and 22 players
        //     $count = rand(11, 22);
        //     for ($i = 0; $i < $count; $i++) {
        //         Player::create([
        //             'first_name'    => $faker->firstName,
        //             'last_name'     => $faker->lastName,
        //             'date_of_birth' => $faker->dateTimeBetween('-40 years', '-18 years')
        //                 ->format('Y-m-d'),
        //             'team_id'       => $team->id,
        //         ]);
        //     }
        // }
    }
}
