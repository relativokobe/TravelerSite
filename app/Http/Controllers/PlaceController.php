<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TouristSpot;
use App\Place;

class PlaceController extends Controller
{
    //


    public function addPlace($spot,$touristSpotId,Request $request){

    	$touristSpot = TouristSpot::find($touristSpotId);
        $type = $request->type;
    	return view('addPlace',compact('touristSpot','type'));

    }
    public function submitPlace($spot,$touristSpotId,Request $request){
    	
    	$url = $this->uploadFile($request->file('image'));

    	Place::create([
    		'kind'=>$request->kind,
    		'website_url'=>$request->website_url,
    		'email_address'=>$request->emailAdd,
    		'tourist_spot_id'=>$touristSpotId,
    		'description'=>$request->description,
    		'name'=>$request->name,
    		'owner'=>$request->owner,
    		'address'=>$request->address,
    		'kind'=>$request->kind,
    		'contact_no'=>$request->contactNo,
    		'image_url'=>$url,
    		'per'=>$request->per,
    		'estimated_Budget'=>$request->price,
    		]);

    	return redirect($spot.'/'.$touristSpotId);

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


      public function placesAccordingToBudget(Request $request){

        $places = Place::whereBetween('estimated_Budget',array($request->minimum,$request->maximum))
                        ->where('tourist_spot_id',$request->id)
                        ->get();

        $tourist_spot_id = $request->id;
        
        return view('places',compact('places','tourist_spot_id'));
    }
}
