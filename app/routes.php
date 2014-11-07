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

Route::get('/', 'HomeController@index');



Route::get('/api', function(){


    $query = "search?term=chinese+indian+food&location=10025";
    #$query = "search?term=roti-roll-bombay-frankie-new-york";

    #return App::make('yelp')->search($query);
    $results =  Shareameal\Yelp\Yelp:: search($query);
    //return $results;

    //$user = User::where("username", "=", ); //s

    //$user->username= "asdsd";
    //$user->save();


    $business = array_fetch($results['businesses'],'name');
   // return $business;

});