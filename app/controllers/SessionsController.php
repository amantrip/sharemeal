<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::check()){
            return Redirect::to('/');
        }

        $user = Auth::user();
        if(Scheduler::where('uid', '=', $user->id)->count() > 0){
            //return "Redirecting";
            return Redirect::to('/inline');
        }
        //return Scheduler::where('uid', '=', $user->id)->count();
        return View::make('sessions.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return Redirect::to('/404error');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$cuisines = [];


        if(Input::get('french') == 'french'){
            Session::push('cuisines', 'french');
            $cuisines[] = Input::get('french');
        }

        if(Input::get('italian') == 'italian'){
            Session::push('cuisines', 'italian');
            $cuisines[] = Input::get('italian');
        }

        if(Input::get('chinese') == 'chinese'){
            Session::push('cuisines', 'chinese');
            $cuisines[] = Input::get('chinese');
        }
        if(Input::get('indian') == 'indian'){
            Session::push('cuisines', 'indian');
            $cuisines[] = Input::get('indian');
        }
        if(Input::get('mexican') == 'mexican'){
            Session::push('cuisines', 'mexican');
            $cuisines[] = Input::get('mexican');
        }
        if(Input::get('lebanese') == 'lebanese'){
            Session::push('cuisines', 'lebanese');
            $cuisines[] = Input::get('lebanese');
        }
        if(Input::get('japanese') == 'japanese'){
            Session::push('cuisines', 'japanese');
            $cuisines[] = Input::get('japanese');
        }
        if(Input::get('spanish') == 'spanish'){
            Session::push('cuisines', 'spanish');
            $cuisines[] = Input::get('spanish');
        }
        if(Input::get('greek') == 'greek'){
            Session::push('cuisines', 'greek');
            $cuisines[] = Input::get('greek');
        }
        if(Input::get('american') == 'american'){
            Session::push('cuisines', 'american');
            $cuisines[] = Input::get('american');
        }

        $validation = Validator:: make(Input::all(),['zipcode' => 'max:5']);

        if($validation->fails()){
            return Redirect:: back()->withInput()->withErrors($validation->messages());
        }


        if(count($cuisines) < 1){
            return Redirect:: back()->withInput();
        }

        Session::push('zipcode', Input::get('zipcode'));

        return Redirect::route('results.index'); #Session::get('zipcode');#
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Redirect::to('/404error');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return Redirect::to('/404error');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        return Redirect::to('/404error');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        return Redirect::to('/404error');
	}


}
