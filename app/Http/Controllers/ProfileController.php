<?php

namespace App\Http\Controllers;


class ProfileController extends Controller
{
    //

    public function getDetails($uid){


      return response()->json([
        'show profile controller: ' => $uid
      ]);
    }
}
