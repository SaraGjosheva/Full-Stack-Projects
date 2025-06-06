<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cocktail_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('event_type');
            $table->text('message');
            $table->date('reservation_date');
            $table->time('reservation_hour');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cocktail_reservations');
    }
};
