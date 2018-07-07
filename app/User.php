<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password', 'last_name', 'role','age','image_url','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function images(){
        return $this->hasMany('App\Image','utp_id','id');
    }

    public function visited_tourist_spots(){
        return $this->hasMany('App\UserTouristSpot','user_id','id');
    } 

    public function visited_place(){
        return $this->hasMany('App\UserPlace','user_id','id');
    }

}
