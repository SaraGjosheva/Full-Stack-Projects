<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('match_player', function (Blueprint $table) {
            $table->id();
            $table->foreignId('football_match_id')->constrained()->cascadeOnDelete();
            $table->foreignId('player_id')->constrained()->cascadeOnDelete();
            $table->unique(['football_match_id', 'player_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_player');
    }
};
