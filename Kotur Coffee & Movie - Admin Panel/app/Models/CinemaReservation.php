<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CinemaReservation extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'full_name',
        'email',
        'event_type',
        'message',
        'reservation_date',
        'reservation_hour',
    ];

    // Relationship with Event
    // public function event()
    // {
    //     return $this->belongsTo(Event::class);
    // }
}
