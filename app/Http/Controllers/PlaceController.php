<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use PhpParser\Node\Stmt\TryCatch;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\Log;

class PlaceController extends Controller
{

    // adds new place to database
    public function AddNewPlace(Request $request){

        // try {
        //     $title = "request->input('title')";
        //     $description = "request->input('description')";
        //     $image = "request->input('image')";
        //     $address = "request->input('address')";
        //     $likes = "request->input('likes')";
        //     $user_id = 1;

            Place::create([
                'title' => "title", 
                'description' => "description", 
                'image' => "image", 
                'adress' => "address", 
                'likes' => 1, 
                'user_id' => "Aryanna Hand - 1"
            ]);


        // } catch (Exception $err) {
        //     Log::$err;
        // }


        return response()->json([
            'status' => 200,
            'message' => "Place added successfuly",
            'newPlace' => $request->all()
        ]);


    }
 

    // returns all places
    public function getPlaces(){
        $places = Place::all();


        return response()->json([
            "places"=>$places,
        ]);
    }

    // returns place by setted id
    public function getPlaceById($id){
        $place = Place::find($id);


        return response()->json([
            "place"=>$place
        ]);
    }
}
