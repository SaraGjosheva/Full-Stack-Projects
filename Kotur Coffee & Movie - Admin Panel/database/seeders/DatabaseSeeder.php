<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\JobApplicationsSeeder;
use Database\Seeders\CinemaReservationsSeeder;
use Database\Seeders\CocktailReservationsSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            JobApplicationsSeeder::class,
            CinemaReservationsSeeder::class,
            CocktailReservationsSeeder::class,
            EventSeeder::class,
            MenuItemSeeder::class,
            GallerySeeder::class,
        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'role' => 'admin',
        // ]);
    }
}
