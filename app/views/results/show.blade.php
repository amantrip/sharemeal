@extends('layouts.home')

@section('title')
    <title>Restaurants Results</title>
@stop


@section('styling')
    <link rel="stylesheet" href="/css/sessions-override.css">
@stop

@section('content')
			<ul class="nav nav-tabs">
			  <li class="active">
			  	<a href="#dashboard" data-toggle="tab">
			  		<div class="text-small">Restaurants with</div>
			  		<span class="text-uppercase">Waiting Members</span>
			  		<span class="text-gray-dark">/</span>
			  		<span class="small text-gray-dark">{{count($waiting)}} match(es)</span>
			  	</a>
			  </li>
			  <li>
			  	<a href="#statistics" data-toggle="tab">
			  		<div class="text-small">Other Matches</div>
			  		<span class="text-uppercase">JOIN Waiting Queue</span>
			  		<span class="text-gray-dark">/</span>
			  		<span class="small text-gray-dark">{{count($rest_id)}} restaurant(s)</span>
			  	</a>
			  </li>
			</ul>
<!-- DASHBOARD TAB -->
  		<div class="bg-white b-1px-gray-light b-top-none brad-bottom brad-tr b-bot-2px-gray-light">

  			<div class="tab-content">

  				<div class="tab-pane active fade in p-30" id="dashboard">


  					@if (count($waiting) == 0)
                        <h1 class="text-center font-w-100">Sorry!</h1>
                      	<div class="row">
                      	    <p class="m-b-30 p-b-30 text-gray-alt text-uppercase text-center col-lg-8 col-lg-offset-2"> There is no one at the moment with similar cuisine preferences, please add yourself to waiting lines of a few restaurants in the other TAB!</p>
                      	</div>
                    @endif
                    @if (count($waiting) > 0)
                        <h1 class="text-center font-w-100">Congratulations!</h1>
                      	<div class="row">
                      	    <p class="m-b-30 p-b-30 text-gray-alt text-uppercase text-center col-lg-8 col-lg-offset-2">There are one or more matches to your cuisine preferences, you choose a match and we will email you the details!</p>
                      	</div>

                    {{Form:: open(['action' => 'SchedulerController@waiting'])}}
                    @foreach($waiting as $restaurant)
                        <div class="row">
                            <div class="col-sm-5 text-center">
                                <div class="circle-50-icon bg-green-dark m-t-10">
                                    <div class="iconmelon icon-white">
                                        <svg viewBox="0 0 32 32">
                                            <g filter="">
                                        	    <use xlink:href="#chaplin-hat-movie"></use>
                                        	</g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-large text-gray-alt">{{$restaurant->rname}}</div>

                                <!--<a href="pricing.html" class="btn btn-primary btn-lg m-t-10">Choose Restaurant</a>-->
                                <div class="m-b-10">
                                    {{Form:: radio("restaurant", $restaurant->rid, false,  ['class' => 'icheck', 'required'])}}
                                    <span class="m-l-10">Choose {{$restaurant->rname}}</span>
                                    {{ Form::hidden('uid', $restaurant->uid) }}
                                     <span class="m-l-10 text-white">Female</span>
                                 </div>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="">Match Details</h4>
                                <p class="text-gray-alt">{{User::find($restaurant->uid)->gender}} user</p>
                                <hr>
                                <h4>Restaurant Address</h4>
                                <p class="text-gray-alt">{{ $restaurant->raddress }}</p>
                                <hr>
                                <h4 class="">Restaurant URL</h4>
                                <p class="text-gray-alt">{{ $restaurant->rurl }}</p>

                            </div>
                        </div>
                    @endforeach
                    <hr><br>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            {{ Form:: submit('Finish', ['class' => 'btn btn-primary btn-lg']) }}
        	            </div>
                    </div>
                    <br>
                    {{Form:: close()}}
                    @endif

                </div>

					<!-- STATISTICS TAB -->
  				<div class="tab-pane fade p-30" id="statistics">
                    @if (count($rest_id) > 0)
  					<h1 class="text-center font-w-100">Yay! We found some matches for you!</h1>
  					<div class="row">
  						<p class="m-b-30 p-b-30 text-gray-alt text-uppercase text-center col-lg-8 col-lg-offset-2">There are one or more matches to your cuisine perferences, add yourself to multiple waiting lines and we will email you once we find a match!</p>
  					</div>
  					@endif

  					@if (count($rest_id) == 0)
                        <h1 class="text-center font-w-100">Sorry!</h1>
                      	<div class="row">
                      	    <p class="m-b-30 p-b-30 text-gray-alt text-uppercase text-center col-lg-8 col-lg-offset-2"> There is no one at the moment with similar cuisine perferences, please add yourself to waiting lines of a few restaurants!</p>
                      	</div>
                    @endif
                    {{Form::open(['action' => 'SchedulerController@rest', 'class' => 'form-horizontal'])}}
                        {{ Form::hidden('count', count($rest_id)) }}
                        <div class="form-group">
                            {{ Form:: label('restaurants', 'Restaurants you\'d like to eat at? (Choose at least one)', ['class' => 'col-sm-2 control-label']) }}
                                <div class="col-sm-10 m-t-10">
                                    @for($i = 0; $i < count($rest_id);$i++)

                                        <div class="m-b-10">
                                    	    {{Form:: checkbox($i, 'yes', false, ['class' => 'icheck'])}}
                                    			<span class="m-l-10">{{$rest_name[$i]}}</span>

                                                <span class="m-l-10">{{$rest_locations[$i][0]}}</span>
                                                {{ Form::hidden($i.'-id', $rest_id[$i]) }}
                                                {{ Form::hidden($i.'-name', $rest_name[$i]) }}
                                                {{ Form::hidden($i.'-locations', $rest_locations[$i][0]) }}
                                                {{ Form::hidden($i.'-url', $rest_url[$i]) }}
                                    		</div>
                                    @endfor
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                {{ Form:: submit('Join Waiting Line', ['class' => 'btn btn-primary btn-lg']) }}
        	                </div>
                         </div>
                    {{Form::close()}}
  				</div>
  			</div>
  		</div>

@stop


@section('footer')
@stop
