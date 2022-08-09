<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function show(Request $request){

        file_put_contents(storage_path() . '/request.log', $request->all(), FILE_APPEND);

        return 'repsponse';
    }
}
