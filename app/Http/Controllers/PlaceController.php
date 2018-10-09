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
        $error = null;
    	return view('addPlace',compact('touristSpot','error'));
        
    }
    
    public function submitPlace($spot,$touristSpotId,Request $request){
    	$error = $this->validation($request);
        $touristSpot = TouristSpot::find($touristSpotId);
        if($error == false){
            
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
              'distance'=>$request->distance
            ]);
            return redirect($spot.'/'.$touristSpotId);
            
        }
    	
        return view('addPlace',compact('error','touristSpot'));
    	

    }

    public function validation($request){

         if($this->checkEmail($request->emailAdd) != true){
            return "Please input a valid email address";
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

        if($request->minimum >= $request->maximum){
            $activities = Place::where('tourist_spot_id',$request->id)
                        ->where('kind','activity')
                        ->get();

                      return 'error';
        }else{
            $total_budget = 0;
           
           $activitiesQuery = Place::where('tourist_spot_id',$request->id)
                  ->where('kind','activity')
                  ->orderBy('estimated_Budget','asc')
                  ->get();

           $previousTotalSum = 0;
           $nextTotalSum = 0;
           $activitiesC = array();
           $combo = array();
           $counter = 0;
           $allBefore = array();
           $first = true;

           foreach($activitiesQuery as $activity){
              $nextTotalSum = $nextTotalSum + $activity->estimated_Budget;
              if($nextTotalSum <= $request->maximum){
                array_push($combo,$activity);
                if($counter+1 == count($activitiesQuery)){
                  array_push($activitiesC,$combo);
                }
              }else{
               
                if($first == true){
                 
                  $first = false;
                  foreach($combo as $act){
                    
                    array_push($allBefore,$act);
                  }

                }else{
                  $nextTotalSum = $nextTotalSum - $activity->estimated_Budget;
                  
                  $comboTempo = $combo;
                  foreach($allBefore as $before){
                    $tempo = $nextTotalSum + $before->estimated_Budget;
                    if($tempo <= $request->maximum){
                      array_push($combo,$before);
                    }
                  }
                  foreach($comboTempo as $act){
                   array_push($allBefore,$act);  
                  }
                }
                array_push($activitiesC,$combo);

                $combo = array();
                $nextTotalSum = 0;
                if($activity->estimated_Budget <= $request->maximum){
                  $nextTotalSum = $activity->estimated_Budget;
                  array_push($combo,$activity);
                  if($counter+1 == count($activitiesQuery)){
                    $comboTempo = $combo;
                    $tempo = $activity->estimated_Budget;
                    foreach($allBefore as $before){
                      $tempo = $tempo + $before->estimated_Budget;
                      if($tempo <= $request->maximum){
                        array_push($combo,$before);
                      }
                    }
                    array_push($activitiesC,$combo);
                  }
                }
              }

              $counter++;
           }

          }


       //return null;
        $activities = null;
        $tourist_spot_id = $request->id;
      

        return view('funAndActivitiesList',compact('activitiesC','tourist_spot_id','activities'));
        }
}
