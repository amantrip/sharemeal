<?php

class ResultsController extends \BaseController {

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
            Redirect::to('/inline');
        }



        $zipcode = Session::get('zipcode');
        if(!isset($zipcode)){
            return Redirect::route('sessions.index');
        }
        $query = "search?location=".$zipcode[0]."&term=";

        $cuisines = Session::get('cuisines');

        for($i = 0; $i < count($cuisines);$i++){
            $query = $query.$cuisines[$i]."+";
        }
        $query = $query."food";

        //return $query;
        $results =  Shareameal\Yelp\Yelp:: search($query);

        //Get relevant information and send to view
        $businesses_id = array_fetch($results['businesses'],'id');
        $businesses_name = array_fetch($results['businesses'],'name');
        $businesses_locations = array_fetch($results['businesses'],'location.address');
        $businesses_url = array_fetch($results['businesses'],'url');



        $waiting = [];

        for($j = 0; $j < count($businesses_id); $j++){
            $count = Scheduler::where('rid', '=', $businesses_id[$j])->count();
            $sch = Scheduler::where('rid', '=', $businesses_id[$j])->first();
            if($count >= 1) {
                $waiting[] = $sch;
                // Remove this restaurant from the list
                unset($businesses_id[$j]);
                unset($businesses_name[$j]);
                unset($businesses_locations[$j]);
                unset($businesses_url[$j]);
                $businesses_id = array_values($businesses_id);
                $businesses_name = array_values($businesses_name);
                $businesses_locations = array_values($businesses_locations);
                $businesses_url = array_values($businesses_url);
            }
        }

        //return $query;
        return View::make('results.show', ['waiting' => $waiting, 'rest_id' => $businesses_id, 'rest_name' => $businesses_name, 'rest_locations' => $businesses_locations, 'rest_url' => $businesses_url]);

    }

    public function waiting(){
        //Remove from Scheduler for all instances for uid
        //Send both auth::user() and uid emails about them being paired

        $uid = Input::get('uid');
        $restaurant_id = Input::get('restaurant');

        while(Scheduler::where('uid', '=', $uid)->count()>0){
            $sch =  Scheduler::where('uid', '=', $uid);
            $sch->delete();
        }

        return "Notify Both users";

    }

    public function rest(){
        //To all the restaurants that were checked, add auth::user to DB

       $user = Auth::user();

        $selected = 0;

       for($i = 0; $i < Input::get('count'); $i++){

            if(Input::get($i) =='yes'){
                $selected++;
                Scheduler:: create([
                   'uid' => $user->id,
                    'rid' => Input::get($i.'-id'),
                    'rname' => Input::get($i.'-name'),
                    'raddress' => Input::get($i.'-locations'),
                    'rurl' => Input::get($i.'-url')
                ]);
            }
       }

       if($selected == 0){
           return Redirect::route('results.index');
       }

       return Redirect::to('/thankyou');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
