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

#Route::get('/', 'AuthenticationController@create');
Route::get('/', function(){
   return Redirect::to('/locked');
});
Route::get('logout', 'AuthenticationController@destroy');
Route::resource('accounts', 'AuthenticationController');


Route::get('/register', 'RegistrationController@create');
Route::get('/verify', 'RegistrationController@verify');
Route::post('/verify', 'RegistrationController@verification');
Route::resource('users', 'RegistrationController');


Route::resource('sessions', 'MemberSessionController');

Route::resource('results', 'SchedulerController');
Route::post('/results/waiting', 'SchedulerController@waiting');
Route::post('/results/rest', 'SchedulerController@rest');


Route::get('/welcome', 'HomeController@welcome');
Route::get('/failed', 'HomeController@failed');
Route::get('/inline', 'HomeController@inline');
Route::get('/thankyou', 'HomeController@thankyou');
Route::get('/404error', 'HomeController@error');
Route::get('/matched', 'HomeController@matched');
Route::get('/locked', 'HomeController@locked');

Route::get('/history', 'HistoryController@renderHistoryView');
Route::get('/history/edit/{id}', 'HistoryController@renderEditHistoryView');
Route::post('/history/edit', 'HistoryController@editHistory');

App::missing(function($exception)
{
    // return Response::view('errors.missing', array(), 404);
    return Redirect::to('404error');
});

/*Route::get('/mail',  function(){

    Mail::send('emails.test', [], function($message){
        $message->to('akhimantripragada@gmail.com')->subject('Test Mandrill Email');
    });



});*/

/*Route::get('/login', function(){

    $user = Auth::user();


    return $user->email;
})->before('auth');*/



/*Route::get('/test', function(){

    $user = User::find(1);

    return $user->email;

});*/

/*Route::get('/api', function(){


    $query = "search?term=food&location=San+Francisco";
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