<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = ['dest_id','comment','user_id'];

    public function dest(){
    	return $this->belongsTo('App\TouristSpot','dest_id','id');
    }
    public function tourist(){
    	return $this->belongsTo('App\User','user_id','id');
    }

}
