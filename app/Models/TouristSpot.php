<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristSpot extends Model
{
    use HasFactory;

    protected $table = 'tourist_spots';
    protected $fillable = ['name', 'description', 'image_path', 'province'];

    public function images()
{
    return $this->hasMany(TouristSpotImage::class);
}



}
