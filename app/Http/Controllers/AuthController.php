<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

  public function login(Request $request){ 

    $validator = Validator::make($request->all(), 
      [
        'email' => ['email', 'required'],
        'password' => ['required'],
      ]
    );
    
    if ($validator->fails())
    {
      return response()->json([
        'status' => false,
        'message' => $validator->getMessageBag()->all(),
        'user' => null,
        'request' => $request->all()
      ]);
    }

    if(Auth::attempt($request->all())){ 

      $user = Auth::user(); 
      return response()->json([
        'status' => true,
        'message' => 'User loaded successfuly',
        'user' => $user,
        'request' => $request->cookie()
      ]); 
    } else { 
      return response()->json([
        'status' => false,
        'message' => 'Wrong credentials! Please try again',
        'user' => null,
        'request' => $request->all()
      ]); 
    } 

  }


  
}
