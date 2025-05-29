<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'time',
        'description',
        'image'
    ];


    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }
}
