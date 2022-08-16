<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaceController;

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


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('users', [AuthController::class, 'fetchAllUsers'])->name('fetchAllUsers');
Route::get('users/{uid}', [AuthController::class, 'fetchUserById'])->name('fetchUserById');


Route::post('places/new', [PlaceController::class, 'AddNewPlace'])->name('AddNewPlace');
Route::post('places/update/{pid}', [PlaceController::class, 'UpdatePlace'])->name('UpdatePlace');
Route::get('places/delete/{pid}', [PlaceController::class, 'DeletePlace'])->name('DeletePlace');