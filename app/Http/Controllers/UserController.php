<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //

    public function register(){

    	return view('register.register');
    }

    public function submitRegister(Request $request){

        $email = User::where('email',$request->email)->get();
        if($email->count()){

        }else{

            $user = User::create([
            'first_name'=>$request->firstName,
            'last_name'=>$request->lastName,
            'image_url'=>''s,
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

    public function southOrNorth(){
    	return view('southnorth');
    }
}
