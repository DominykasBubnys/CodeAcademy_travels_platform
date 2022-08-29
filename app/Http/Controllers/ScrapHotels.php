<?php

namespace App\Http\Controllers;
use Goutte\Client;

use Illuminate\Http\Request;
use App\Models\Place;

class ScrapHotels extends Controller
{
    //

    public function getHTML($url,$timeout)
    {
        $ch = curl_init($url); // initialize curl with given url
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
        curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
        return @curl_exec($ch);
    }



    public function getHotelsNearYou(){

        // $client = new Client();
        // $crawler = $client->request('GET', 'https://www.airbnb.com/rooms/1064946');
        // $hotels_number = $crawler->filter("._fecoyn4");

        $place = Place::find(1);
        
        // var_dump($hotels_number);

        return response()->json([
            'scrap data: '=> $place->comments
        ]);
    }
}
