<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{

  public function register(Request $request){
    $validator = Validator::make($request->all(), 
      [
        'name'=>['required', 'string'],
        'email' => ['email', 'required', 'unique:users,email'],
        'password' => ['required'],
        'country'=>['string'],
        'image'=>['string', 'url']
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

    $user = User::create([
      'name'=>$request->get('name'),
      'email'=>$request->get('email'),
      'password'=>Hash::make($request->get('password')),
      'country'=>$request->get('country'),
      'image'=>$request->get('image')
    ]);

    

    $token = $user->createToken('FundaProjectToken')->plainTextToken;

    return response()->json([
      'user'=>$user,
      'token'=>$token,
      'status'=>true,
      'message'=>"Users registration went successfuly"
    ]);

    
  }


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


      $token = $user->createToken('Token Name')->accessToken->plainTextToken;

      // if ($request->remember_me)
      //     $token->expires_at = Carbon::now()->addWeeks(1);
      // $token->save();

      

      return response()->json([
        'status' => true,
        'message' => 'User loaded successfuly',
        'user' => $user,
        'token'=>$token,
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

  public function fetchUserById($uid){

    $user = User::where('id',$uid)->first();
    $status = true;

    if(!$user)$status=false;

    return response()->json([
      'user'=> $user,
      'status'=>$status
    ]);
  }


  public function fetchAllUsers(){
    $allUsers = User::all();
    
    return response()->json([
      'status' => true,
      'message' => 'List of all users',
      'users' => $allUsers,
    ]); 
  }


  
}
