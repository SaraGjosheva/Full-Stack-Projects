<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'image'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
