<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TouristSpot extends Model
{
    //
    protected $fillable = ['name','long','lat','owner','address','image_url','description','review','image_url','contact_no','email_address','web_url','price','per','spot'];

    public function places(){
    	return $this->hasMany('App\Place','tourist_spot_id','id');
    }

    public function comments(){
    	return $this->hasMany('App\Comment','dest_id','id');
    }

    public function images(){
    	return $this->hasMany('App\Image','utp_id','id');
    }

    
}
