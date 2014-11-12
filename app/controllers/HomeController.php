<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function welcome()
	{
		return View::make('welcome');
	}

    public function failed(){
        return View::make('failed');
    }

    public function inline(){

        return View::make('inline');
    }

    public function thankyou(){
        if(!Auth::check()){
            return Redirect::to('/');
        }
        return View::make('thankyou');
    }

    public function error(){
        return View::make('404');
    }

    public function matched(){
        if(!Auth::check()){
            return Redirect::to('/');
        }
        return View::make('matched');
    }
}
