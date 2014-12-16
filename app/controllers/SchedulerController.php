<?php

class SchedulerController extends \BaseController {

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
            return Redirect::to('/inline');
        }

        $zipcode = Session::get('zipcode');
        $gender = Session:: get('gender');

        if(!isset($zipcode) || !isset($gender)){
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

            if($count >= 1) {
                $sch = Scheduler::where('rid', '=', $businesses_id[$j])->firstorFail();
                //$waiting[] = $sch;

                $scheduler_user = User::find($sch->uid);


                if($gender[0] == "either" || $scheduler_user->gender == $gender[0]) { //Gender Test Passed on Current User

                    if($sch->gender == "either" || $sch->gender == $user->gender){// Gender Test Passed on user in Scheduler

                        #return History::where('uid', '=' ,$user->id)->where('matched_id', '=',$scheduler_user->id)->where('ban', '=', 'yes')->count();
                        if(History::where('uid', '=' ,$user->id)->where('matched_id', '=',$scheduler_user->id)->where('ban', '=', 'yes')->count() == 0
                            && History::where('uid', '=' ,$scheduler_user->id)->where('matched_id', '=',$user->id)->where('ban', '=', 'yes')->count() == 0){ //Not on each others ban list
                                array_push($waiting, $sch);// Then add this restaurant to the waiting restaurants
                            }
                    }
                }

                // Remove this restaurant from the list
                unset($businesses_id[$j]);
                unset($businesses_name[$j]);
                unset($businesses_locations[$j]);
                unset($businesses_url[$j]);
                $businesses_id = array_values($businesses_id);
                $businesses_name = array_values($businesses_name);
                $businesses_locations = array_values($businesses_locations);
                $businesses_url = array_values($businesses_url);
                $j--;


            }

        }


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

        $user = Auth::user();
        $matched_user = User::find($uid);

        $sent = static::sendMail($user->id, $uid, $restaurant_id);

        //return "Notify Both users";

        return Redirect::to('/matched');

    }

    private static function sendMail($curr_uid, $matched_uid, $restaurant_id){
        $user1 = User::find($curr_uid);
        $user2 = User::find($matched_uid);

        //Add to User1's history
        History::create([
            'uid' => $curr_uid,
            'matched_id' => $matched_uid,
            'restaurant_id' => $restaurant_id
        ]);

        //Add to User2's history
        History::create([
            'uid' => $matched_uid,
            'matched_id' => $curr_uid,
            'restaurant_id' => $restaurant_id
        ]);

        $email_data1 = array(
            'recipient' => $user1->email,
            'subject' => 'Congratulations! We found you a match!'
        );
        $view_data1 = [
            'email' => $user2->email,
            'gender' => $user2->gender,
            'restaurant' => $restaurant_id
        ];

        Mail::send('emails.match', $view_data1, function($message) use ($email_data1) {
            $message->to( $email_data1['recipient'] )
                ->subject( $email_data1['subject'] );
        });

        $email_data2 = array(
            'recipient' => $user2->email,
            'subject' => 'Congratulations! We found you a match!'
        );
        $view_data2 = [
            'email' => $user1->email,
            'gender' => $user1->gender,
            'restaurant' => $restaurant_id
        ];

        Mail::send('emails.match', $view_data2, function($message) use ($email_data2) {
            $message->to( $email_data2['recipient'] )
                ->subject( $email_data2['subject'] );
        });


        return true;
    }

    public function rest(){
        //To all the restaurants that were checked, add auth::user to DB

        $user = Auth::user();

        $selected = 0;

        $gender = Session::get('gender');



       for($i = 0; $i < Input::get('count'); $i++){

            if(Input::get($i) =='yes'){
                $selected++;
                Scheduler:: create([
                   'uid' => $user->id,
                    'rid' => Input::get($i.'-id'),
                    'rname' => Input::get($i.'-name'),
                    'raddress' => Input::get($i.'-locations'),
                    'rurl' => Input::get($i.'-url'),
                    'gender' => $gender[0]
                ]);
            }
       }

       if($selected == 0) {
           return Redirect::route('results.index');
       }

       return Redirect::to('/thankyou');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	public function create()
	{
        return Redirect::to('/404error');
	}*/


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 *
	public function store()
	{
        return Redirect::to('/404error');
	}*/


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
