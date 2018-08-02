<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TouristSpot;
use App\Place;

class TouristSpotController extends Controller
{
    //
    public function spot($spot){
        $touristSpots = TouristSpot::where('spot',$spot)->get();
        
    	return view('Spot.spot',compact('spot','touristSpots'));
    }


    public function submitTouristSpot($spot,Request $request){

        $url = $this->uploadFile($request->file('image'));
    	TouristSpot::create([
    		'name'=>$request->name,
    		'address'=>$request->address,
    		'description'=>$request->description,
    		'owner'=>$request->owner,
    		'contact_no'=>$request->contactNo,
    		'price'=>$request->price,
    		'per'=>$request->per,
    		'image_url'=>$url,
    		'web_url'=>$request->webUrl,
    		'email_address'=>$request->emailAdd,
    		'spot'=>$spot,
            'lat'=>$request->lat,
            'long'=>$request->long,
    		]);
        
    	return redirect($spot);

    }	
    public function uploadFile($file){

        $extension = $file->clientExtension();
        $destinationPath = public_path('File_attachments');

         if($extension != "bin")
        {

            $destinationPath = public_path('file_attachments');
            $filename = substr(sha1(mt_rand().microtime()), mt_rand(0,35),7).$file->getClientOriginalName();
            $file->move($destinationPath,$filename);
       
            return url('/File_attachments').'/'.$filename;
            
            
        }
        else
        {
            $files = public_path('assets/images/ethelon.png');
            return $file;
        }

    }

    public function touristSpotProfile($spot,$touristSpotId,Request $request){
        $touristSpot = TouristSpot::find($touristSpotId);
        $places = $touristSpot->places;
        $tourist_spot_id  = $touristSpot->id;
        if($request->minimum != null && $request->maximum != null){
             $places = Place::whereBetween('estimated_Budget', array($request->minimum,$request->maximum))->get();
        }

        $comments = $touristSpot->comments;
        $rating = $touristSpot->review;
        
        return view('touristSpotProfile',compact('touristSpot','comments','spot','places','rating','tourist_spot_id'));
    }

     public function hiddenRatings(Request $request){
        return view('hiddenRating');
    }

    public function rate($spot,$touristSpotId,Request $request){
       
        $touristSpot = TouristSpot::find($touristSpotId);
        $newTotalRating = $touristSpot->totalAddedRating + $request->rating;
        $rating = $newTotalRating / ($touristSpot->reviewers_no + 1);
        $touristSpot->review = $rating;
        $touristSpot->totalAddedRating = $newTotalRating;
        $touristSpot->reviewers_no = ($touristSpot->reviewers_no + 1);
        $touristSpot->save();

        return view('rating',compact('rating'));
    }

}
