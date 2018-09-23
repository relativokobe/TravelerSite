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


Route::get('/logoutofceburoute','UserController@logoutofceburoute');
Route::get('/register','UserController@register');
Route::post('/submitRegistration','UserController@submitRegister');
Route::get('/southnorth','UserController@southOrNorth');
Route::get('/{spot}','TouristSpotController@spot');
Route::post('/login','UserController@login');
Route::get('/{spot}/addtouristspot','UserController@addTouristSpot');
Route::post('/{spot}/submitTouristSpot','TouristSpotController@submitTouristSpot');
Route::get('/{spot}/{touristSpotId}','TouristSpotController@touristSpotProfile');
Route::post('/{spot}/{touristSpotId}/addComment','UserController@addComment');
Route::get('/{spot}/{touristSpotId}/addPlace','PlaceController@addPlace');
Route::post('/{spot}/{touristSpotId}/submitPlace','PlaceController@submitPlace');
Route::post('/logouttttt','UserController@logout');
Route::post('/{spot}/{touristSpotId}/change','PlaceController@placesAccordingToBudget');
Route::get('/{spot}/{touristSpotId}/hiddenRating','TouristSpotController@hiddenRatings');
Route::post('/{spot}/{touristSpotId}/rate','TouristSpotController@rate');
Route::get('/{spot}/{touristSpotId}/photos','TouristSpotController@photos');
Route::post('/{spot}/{touristSpotId}/upload','TouristSpotController@upload');
Route::post('/rate','TestController@rate');
Route::get('/{spot}/{touristSpotId}/photoSection','TouristSpotController@photoSection');