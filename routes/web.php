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

Route::get('/home', function () {
    return view('LandingPage');
});


Route::get('/register','UserController@register');
Route::post('/submitRegistration','UserController@submitRegister');
Route::get('/southnorth','UserController@southOrNorth');
Route::get('/south','TouristSpotController@south');
Route::get('/north','TouristSpotController@north');