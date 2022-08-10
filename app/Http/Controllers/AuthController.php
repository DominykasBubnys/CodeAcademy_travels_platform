<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function auth_login(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>['required'],
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);

        if($validator->fails()){
            return response()->json([
                'validate_err'=>$validator->messages()
            ]);
        }


        return response()->json([
            'auth data: '=> $request->all() //[$user_email, $user_password]
        ]);
    }


    public function auth_signup(){
        $validator = Validator::make($request->all(), [
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);

        if($validator->fails()){
            return response()->json([
                'validate_err'=>$validator->messages()
            ]);
        }



        return response()->json([
            'auth data: '=> $request->all() //[$user_email, $user_password]
        ]);
    }

    public function auth(Request $request){

        // $user_email = $request->name('email');
        // $user_password = $request->name('password');
        
        // auth logic



        return response()->json([
            'auth data: '=> $request->all() //[$user_email, $user_password]
        ]);
    }
}
