<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
 

    // returns all places
    public function getPlaces(){
        return Place::all();
    }

    // returns place by setted id
    public function getPlaceById($id){
        return Place::find($id);
    }
}
