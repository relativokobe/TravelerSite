<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nearby_tourist_spots extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['touristSpotId','nearbyTouristSpotId'];
}
