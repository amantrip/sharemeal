<?php

class AuthenticationController extends \BaseController {


	public function create()
    {
        if (Auth::check()) return Redirect::to('/sessions');
        return View::make('accounts.create');
	}


	public function store()
	{
        $user = User::where('email', '=', Input::get('email'))->first();
        $count = User::where('email', '=', Input::get('email'))->count();

        if($count == 0){
            return Redirect::to('/register');
        }

        if($count > 0 && $user->verified == '0'){
            Session::push('email', Input::get('email'));

            return Redirect::to('/verify');
        }

        if (Auth::attempt(Input::only('email', 'password'))){
            return Redirect::to('/sessions');
        }

        return Redirect::back()->withInput();
	}



	public function destroy()
	{
        Session::flush();
		Auth::logout();
        return Redirect::to('/');
	}


}
