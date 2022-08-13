<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PlaceController extends Controller
{

    // adds new place to database
    public function AddNewPlace(Request $request){

        $validator = Validator::make($request->all(), 
            [
                'title' => ['string', 'required'],
                'description' => ['required'],
                'image' => ['required'],
                'address' => ['string', 'required'],
                'author_id' => ['required'],
            ],
        
        );

        if(!$this->doesUserExist($request->input('author_id'))){
            return response()->json([
                'status' => false,
                'message' => "Cannot get user by given id",
                'newPlace' => null,
                'request' => $request->input('author_id')
            ]);
        }

        if ($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->all(),
                'newPlace' => null,
                'request' => $request->all()
            ]);
        }

        try {
            Place::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'), 
                'image' => $request->input('image'), 
                'address' => $request->input('address'), 
                'likes' => 0, 
                'author_id' => $request->input('author_id')
            ]);
        } catch (Exception  $error) {

            return response()->json([
                'status' => false,
                'message' => "error->getMessage()",
                'newPlace' => null,
                'request' => $request->all()
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => "Place added successfuly",
            'newPlace' => $request->all()
        ]);


    }

    public function doesUserExist($uid){
        return User::where('id', $uid)->first();
    }
 

    // returns all places
    public function getPlaces(){
        $places = Place::all();


        return response()->json([
            "places"=>$places,
        ]);
    }

    // returns place by given id
    public function getPlaceById($id){
        $place = Place::find($id);


        return response()->json([
            "place"=>$place
        ]);
    }

    public function getPlacesByUserId($uid){

        $places = Place::where("author_id", $uid)->get();

        return response()->json([
            'places'=>$places
        ]);
    }
}
