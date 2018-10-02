<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    protected $fillable = ['name','address','description','kind','image_url','contact_no','email_address','tourist_spot_id','website_url','owner','estimated_Budget','per','review','distance'];

    public function touristSpot(){
    	return belongsTo('App\TouristSpot','tourist_spot_id','id');
    }


}
