<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TouristSpot;
use App\Place;
use App\UserTouristSPot;
use App\Image;

class TouristSpotController extends Controller
{
    //
    public function spot($spot){
        $touristSpots = TouristSpot::where('spot',$spot)->get();
        $error = null;
        return view('Spot.spot',compact('spot','touristSpots','error'));
    }

    public function submitTouristSpot($spot,Request $request){

        dd($request);
        $error = $this->validation($request);
        dd($request);

        if($error == false){
            $url = $this->uploadFile($request->file('image'));

            $touristSpotId = TouristSpot::create([
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
            'long'=>$request->long
            ])->id;
        }else{
            
             return view('addtouristspot',compact('spot','error'));
        }
    	
        $this->uploadMultipleFile($request->file('images'),$touristSpotId);
        
    	return redirect($spot);

    }	

    public function validation($request){

         if($this->checkEmail($request->emailAdd) != true){
            return "Please input a valid email address";
         }
         if($request->lat == null || $request->long == null){
            return "Please pick a place";
         }

         return false;
    }

    function checkEmail($email) {
      if($email == ''){
          return true;
      }
       if ( strpos($email, '@') !== false ) {
          $split = explode('@', $email);
          return (strpos($split['1'], '.') !== false ? true : false);
       }
       else {
          return false;
       }
   }

    public function uploadMultipleFile($images,$ownerId){

      if($images != null){
          foreach($images as $image){

            Image::create([
               'utp_id'=>$ownerId,
               'image_url'=>$this->uploadFile($image)
            ]);
         }  
      }
         
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
        $places = Place::where('tourist_spot_id',$touristSpot->id)
                       ->where('kind','place')
                       ->get();

        $activities = Place::where('tourist_spot_id',$touristSpot->id)
                                 ->where('kind','activity')
                                 ->get();               

        $tourist_spot_id  = $touristSpot->id;
        $images = Image::where('utp_id',$touristSpot->id)->limit(3)->get();
        if($request->minimum != null && $request->maximum != null){
             $places = Place::whereBetween('estimated_Budget', array($request->minimum,$request->maximum))->get();
        }

        $comments = $touristSpot->comments;
        $rating = $touristSpot->review;

        $userTouristSPot = UserTouristSpot::where('user_id',\Auth::user()->id)
                                        ->where('tourist_spot_id',$touristSpotId)
                                        ->first();
        $rated = false;
        if($userTouristSPot){
         if($userTouristSPot->review != null)
         $rated = true;
        }                      

        $error = null;

        return view('touristSpotProfile',compact('touristSpot','comments','spot','places','rating','tourist_spot_id','rated','images','activities','error'));
    }

     public function hiddenRatings(Request $request){
        return view('hiddenRating');
    }

    public function rate($spot,$touristSpotId,Request $request){


      $error = null;
      $rated = null;
        if($request->rating > 10){
            $rating = TouristSpot::find($touristSpotId)->review;
            $error = 'Rating must not be more than 10';
            $rated = false;
            return view('rating',compact('rating','error','rated'));
        }
        
        $touristSpot = TouristSpot::find($touristSpotId);
        $newTotalRating = $touristSpot->totalAddedRating + $request->rating;
        $rating = $newTotalRating / ($touristSpot->reviewers_no + 1);
        $rating = number_format((float)$rating,1,'.','');
        $touristSpot->review = $rating;
        $touristSpot->totalAddedRating = $newTotalRating;
        $touristSpot->reviewers_no = ($touristSpot->reviewers_no + 1);
        
        $touristSpot->save();

        $userTouristSPot = UserTouristSPot::where('user_id',\Auth::user()->id)
                                        ->where('tourist_spot_id',$touristSpotId)
                                        ->first();

         if(!$userTouristSPot){
            UserTouristSPot::create([
                'user_id'=>\Auth::user()->id,
                'tourist_spot_id'=>$touristSpotId,
                'review'=>$request->rating
                ]);
        }else{

            $userTouristSPot->review = $request->rating;
            $userTouristSPot->save();
            
        }

        $rated = true;

        return view('rating',compact('rating','error','rated'));
        
    }

    public function photos($spot,$touristSpotId){
        $images = Image::where('utp_id',$touristSpotId)->get();
        
        return view('photos',compact('images','touristSpotId'));
    }

    public function upload($spot,$touristSpotId,Request $request){
        
       // $this->uploadMultipleFile($request->images,$touristSpotId);
        
        return redirect($spot.'/'.$touristSpotId.'/photos');
    }

}
