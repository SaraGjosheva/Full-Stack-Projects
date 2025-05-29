<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'name',
        'category',
        'ingredients',
        'image',
        'is_recommended',
        'is_popular',
    ];
}
