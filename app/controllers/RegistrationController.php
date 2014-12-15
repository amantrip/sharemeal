<?php

class RegistrationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
     *
     * public function index()
	{
		//
	}*/


	public function create()
	{
		return View::make('users.create');
	}


	public function store()
	{
		/*$user =  new User;
        $user->email = Input::get('email');
        $user->*/

        if(! User::isValid(Input::all())){
            return Redirect::to('/failed');
        }

        $accesscode = Str::random(60);
        User::create([
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'gender' => Input::get('gender'),
            'accesscode' => $accesscode,
            'verified' => '0'
        ]);

        $email_data = array(
            'recipient' => Input::get('email'),
            'subject' => 'Share-A-Meal: Verification Code'
        );
        $view_data = [
            'accesscode' => $accesscode
        ];

        Mail::send('emails.verify', $view_data, function($message) use ($email_data) {
            $message->to( $email_data['recipient'] )
                ->subject( $email_data['subject'] );
        });

        Session::push('email' , Input::get('email'));
        return Redirect::to('/verify');
	}

    public function verify(){
        return View::make('users.verify');
    }



    public function verification(){
        $email = Input::get('email');
        $accesscode = Input::get('accesscode');

        $user =  User::where('email', '=', $email)->first();
        $user_accesscode = $user->accesscode;

        if($user_accesscode == $accesscode){
            $user->verified = 1;
            $user->save();
            return Redirect::to('/welcome');

        }else{
            return Redirect::back()->withInput();
        }

    }



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 *
	public function show($id)
	{
        return Redirect::to('/404error');
	}*/


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 *
	public function edit($id)
	{
        return Redirect::to('/404error');
	}*/


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 *
	public function update($id)
	{
        return Redirect::to('/404error');
	}*/


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 *
	public function destroy($id)
	{
        return Redirect::to('/404error');
	}*/


}
