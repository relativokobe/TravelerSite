<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TouristSpot;

class TouristSpotController extends Controller
{
    //
    public function south(){
    	$spot = "south";

    	return view('South.south','spot');
    }
    public function north(){
    	$spot = "north";

    	$touristSpots = TouristSpot::where('spot','north')->get();

    	return view('North.north',compact('spot','touristSpots'));
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
    		'spot'=>$spot
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
}
