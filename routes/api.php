<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('places')->group(function(){

    Route::get('/', [PlaceController::class, "getPlaces"]);
    Route::get('/user/{uid}', [PlaceController::class, "getPlacesByUserId"]);
    Route::post('/new-comment', [CommentController::class, 'store'])->name('store');
    Route::post('/new', [PlaceController::class, 'AddNewPlace'])->name('AddNewPlace');
    Route::post('/update/{pid}', [PlaceController::class, 'UpdatePlace'])->name('UpdatePlace');
    Route::get('/delete/{pid}', [PlaceController::class, 'DeletePlace'])->name('DeletePlace');
    Route::get('/{id}', [PlaceController::class, "getPlaceById"]);

});

Route::get("/hotels", [ScrapHotels::class, 'getHotelsNearYou'])->name('hotels');
Route::get('/profile', [ProfileController::class, 'getDetails'])->name('profile');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('users', [AuthController::class, 'fetchAllUsers'])->name('fetchAllUsers');
Route::get('users/{uid}', [AuthController::class, 'fetchUserById'])->name('fetchUserById');