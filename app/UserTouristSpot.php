<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTouristSpot extends Model
{
    //
    protected $fillable = ['user_id','review','visited','tourist_spot_id'];
}
