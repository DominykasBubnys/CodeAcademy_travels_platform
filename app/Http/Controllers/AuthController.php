<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function auth(Request $request){

        
        // auth logic

        return response()->json([
            'auth data: '=>$request->all()
        ]);
    }
}
