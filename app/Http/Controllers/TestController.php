<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TouristSpot;
class TestController extends Controller
{
    public function rate(Request $request){
       
        $touristSpot = TouristSpot::find(11);
        $newTotalRating = $touristSpot + $request->rating;
        $rating = $newTotalRating / ($touristSpot->reviewers_no + 1);
        $touristSpot->review = $rating;
        $touristSpot->totalAddedRating = $newTotalRating;
        $touristSpot->reviewers_no = ($touristSpot->reviewers_no + 1);
        $touristSpot->save();

        return view('rating',compact('rating'));
    }
}
