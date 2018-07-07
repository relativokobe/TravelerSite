<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TouristSpotController extends Controller
{
    //
    public function south(){

    }
    public function north(){
    	return view('North.north');
    }
}
