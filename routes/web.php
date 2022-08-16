<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('places')->group(function(){

    
    // Route::post('/new', [PlaceController::class, "addNewPlace"]);
    Route::get('/', [PlaceController::class, "getPlaces"]);
    Route::get('/user/{uid}', [PlaceController::class, "getPlacesByUserId"]);
    Route::get('/{id}', [PlaceController::class, "getPlaceById"]);

});

Route::get('profile', [ProfileController::class, 'getDetails'])->name('profile');



