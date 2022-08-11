<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;

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

Route::prefix('places')->group(function(){

    Route::post('/new', [PlaceController::class, "addNewPlace"]);

});

// Route::prefix('auth')->group(function(){
//     Route::post('/signup', [AuthController::class, 'auth_signup'])->name('auth_signup');
// });

Route::post('/login', [AuthController::class, "login"])->name('auth_login');




