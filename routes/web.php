<?php

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

Route::get('/', function () {
    return view('LandingPage');
});


Route::get('/register','UserController@register');
Route::post('/submitRegistration','UserController@submitRegister');
Route::get('/southnorth','UserController@southOrNorth');
Route::get('/{spot}','TouristSpotController@spot');
Route::post('/login','UserController@login');
Route::get('/{spot}/addtouristspot','UserController@addTouristSpot');
Route::post('/{spot}/submitTouristSpot','TouristSpotController@submitTouristSpot');
Route::get('/{spot}/{touristSpotId}','TouristSpotController@touristSpotProfile');
Route::post('/{spot}/{touristSpotId}/addComment','UserController@addComment');
Route::get('/{spot}/{touristSpotId}/addPlace','PlaceControllesr@addPlace');
Route::post('/{spot}/{touristSpotId}/submitPlace','PlaceController@submitPlace');
Route::get('/logout','UserController@logout');
Route::post('/{spot}/{touristSpotId}/pisti','PlaceController@placesAccordingToBudget');
Route::get('/{spot}/{touristSpotId}/hiddenRating','TouristSpotController@hiddenRatings');
Route::post('/{spot}/{touristSpotId}/rate','TouristSpotController@rate');


Route::post('/rate','TestController@rate');