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

    	return view('maps');
    }

    public function addComment($spot,$touristSpotId, Request $request){
       
        Comment::create([
            'comment'=>$request->comment,
            'dest_id'=>$touristSpotId,
            'user_id'=>\Auth::user()->id
            ]);

        return redirect()->back();
    }

    public function logout(){

        return 'fuck!';
        auth()->logout();

        return redirect('/');
    }

    public function submitRegister(Request $request){
        dd($request);
        $email = User::where('email',$request->email)->get();
        if($email->count()){

        }else{

            $user = User::create([
            'first_name'=>$request->firstName,
            'last_name'=>$request->lastName,
            'image_url'=>'',
            'email'=>$request->email,
            'password'=>$request->password,
            'address'=>'',
            'role'=>2,
            'age'=>1
            ]);

            auth()->login($user);

            return redirect('southnorth');
        }

    
    	
    }
    public function addTouristSpot($spot){

        // $config['center'] = 'Manila, Philippines';
        // $config['zoom'] = '14';
        // $config['map_height'] = '500px';
        // $config['scrollwheel'] = false;

        // GMapsFacade::initialize($config);
        // $map = GMapsFacade::create_map();

        // $whatIWant = substr($map['js'], strpos($map['js'], "g(") + 1); 

        // $sd = explode(")",$whatIWant,2);
        // $good = substr($sd[0], strpos($sd[0], "(") + 1); 
        // $lat = explode(",",$good,2);
        // $long = substr($good, strpos($good, " ") + 1);


        //return response()->json($long);
        return view('addtouristspot',compact('spot'));
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
