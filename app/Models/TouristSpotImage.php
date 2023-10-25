<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristSpotImage extends Model
{
    use HasFactory;

    protected $table = 'tourist_spot_images';
    protected $fillable = ['tourist_spot_id', 'image_360_path'];

    public function touristSpot()
    {
        return $this->belongsTo(TouristSpot::class);
    }

}
