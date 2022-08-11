<?php

namespace App\Http\Controllers;


class ProfileController extends Controller
{
    //

    public function show(){


      return response()->json([
        'show profile controller'=>'opacki'
      ]);
    }
}
