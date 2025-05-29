<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'position',     
        'cv_path',
    ];
}
