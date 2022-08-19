<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get(uri:'/show-tests', action:'App\Http\Controllers\ShowTestTypeController@show');

Route::post(uri:'/eval-test', action:'App\Http\Controllers\EvalTestController@store');

Route::get(uri:'/show-results', action:'App\Http\Controllers\ShowResultController@show');

Route::get(uri:'/HomeBack', action:'App\Http\Controllers\HomeController@home');