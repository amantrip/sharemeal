<?php

use Shareameal\Yelp;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'AccountsController@create');
Route::get('logout', 'AccountsController@destroy');
Route::resource('accounts', 'AccountsController');


Route::get('/register', 'UsersController@create');
Route::resource('users', 'UsersController');


Route::resource('sessions', 'SessionsController');

Route::resource('results', 'ResultsController');
Route::post('/results/waiting', 'ResultsController@waiting');
Route::post('/results/rest', 'ResultsController@rest');


Route::get('/welcome', 'HomeController@welcome');
Route::get('/failed', 'HomeController@failed');
Route::get('/inline', 'HomeController@inline');
Route::get('/thankyou', 'HomeController@thankyou');

Route::get('/login', function(){

    $user = Auth::user();


    return $user->email;
})->before('auth');



/*Route::get('/test', function(){

    $user = User::find(1);

    return $user->email;

});*/

/*Route::get('/api', function(){


    $query = "search?location=10025&term=indian+food";
    #$query = "search?term=roti-roll-bombay-frankie-new-york";

    #return App::make('yelp')->search($query);
    $results =  Shareameal\Yelp\Yelp:: search($query);
    //return $results;

    //$user = User::where("username", "=", ); //s

    //$user->username= "asdsd";
    //$user->save();


    $business = array_fetch($results['businesses'],'name');
   return $business;

});*/