<?php

namespace Database\Seeders;

use App\Models\Team;
use Faker\Factory as Faker;
use App\Models\FootballMatch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FootballMatchSeeder extends Seeder
{
    public function run(): void
    {
        // $teams = Team::all();

        // if ($teams->count() < 2) {
        //     $this->command->info("Not enough teams to seed matches, need at least 2.");
        //     return;
        // }

        // $faker = Faker::create();

        // // create 20 football matches
        // for ($i = 0; $i < 20; $i++) {
        //     $home = $faker->randomElement($teams);
        //     do {
        //         $away = $faker->randomElement($teams);
        //     } while ($away->id === $home->id);

        //     FootballMatch::create([
        //         'home_team_id' => $home->id,
        //         'away_team_id' => $away->id,
        //         'scheduled_at' => $faker->dateTimeBetween('-1 month', '+1 month'),
        //     ]);
        // }
    }
}
