<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\Facades\GMapsFacade;
use App\User;
use App\Comment;
class UserController extends Controller
{
    //

    public function register(){

        $error = null;
    	return view('Register.register',compact('error'));
    }

    public function addComment($spot,$touristSpotId, Request $request){
       
        Comment::create([
            'comment'=>$request->comment,
            'dest_id'=>$touristSpotId,
            'user_id'=>\Auth::user()->id
            ]);

        return redirect()->back();
    }

    public function logoutofceburoute(){
        \Auth::logout();

        return redirect('/');
    }

    public function submitRegister(Request $request){
        
        $email = User::where('email',$request->email)->get();
        if($email->count()){
            $error = "Email address is already taken";
            return view('Register.register',compact('error'));
        }else{

          $error = $this->validation($request);

          if($error == false){

                $user = User::create([
                'first_name'=>$request->firstName,
                'last_name'=>$request->lastName,
                'image_url'=>'',
                'email'=>$request->email,
                'password'=>$request->password,
                'address'=>'',
                'role'=>2,
                'age'=>$this->calculateAge($request->birthday)
                ]);

                auth()->login($user);

                return redirect('southnorth');
          }else{
            return view('Register.register',compact('error'));
          }
        }
    	
    }

    public function calculateAge($birthday){
        $birthday = \Carbon\Carbon::parse($birthday);
        $now = \Carbon\Carbon::now();

        $age = $now->diffInYears($birthday);

        return $age;
    }

    public function validation($request){
        if(strlen($request->password) < 5){
            return "Password length must be more than 5";    
        }
        if($this->checkEmail($request->email) != true){
            return "Please input a valid email";
        }
        if($this->calculateAge($request->birthday) < 18){
            return "You must be 18 years old and above to register";
        }

        return false;

    }

    function checkEmail($email) {
       if ( strpos($email, '@') !== false ) {
          $split = explode('@', $email);
          return (strpos($split['1'], '.') !== false ? true : false);
       }
       else {
          return false;
       }
   }

    public function addTouristSpot($spot){

        $error = null;
        return view('addtouristspot',compact('spot','error'));
    }

    public function maps(){

    }

    public function login(Request $request){

        $user = User::where('email',$request->input('email'))
                      ->where('password',$request->input('password'))->first();

           if($user){
                auth()->login($user);
                return redirect('southnorth');
           }else{
                return redirect('/');
           }           
    }

    public function southOrNorth(){
    	return view('southnorth');
    }
}
