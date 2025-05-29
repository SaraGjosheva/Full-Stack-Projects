<?php

namespace App\Console\Commands;

use App\Models\FootballMatch;
use Illuminate\Console\Command;

class RandomizeRecentMatches extends Command
{
    protected $signature = 'matches:randomize-recent';
    protected $description = 'Set random scores for matches from last 24h without results';

    public function handle()
    {
        $cutoff = now()->subDay();
        $count = FootballMatch::whereBetween('scheduled_at', [$cutoff, now()])
            ->whereNull('home_score')
            ->count();

        FootballMatch::whereBetween('scheduled_at', [$cutoff, now()])
            ->whereNull('home_score')
            ->chunkById(100, function ($matches) {
                foreach ($matches as $match) {
                    $match->update([
                        'home_score' => rand(0, 5),
                        'away_score' => rand(0, 5),
                    ]);
                }
            });
        $this->info("Randomized {$count} matches.");
    }
}
