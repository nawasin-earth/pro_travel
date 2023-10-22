<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TouristSpot extends Model
{
    protected $fillable = [
        'name', 
        'province', 
        'description', 
        'image_path'
    ];
}
