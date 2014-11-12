@extends('layouts.home')

@section('title')
    <title>Get Started!</title>
@stop

@section('styling')
    <link rel="stylesheet" href="/css/sessions-override.css">
@stop

@section('sidebar')
        <div class="sidebar bg-dark-gray text-white pushy pushy-left">

    		<hr class="no-margin"><br><br><br>

    		<!--<ul class="unstyled nav">
                <li>Simple 3 Step Process</li>
                <li><a href="" class="text-left">1. Enter Zip Code</a></li>
                <li><a href="" class="text-left">2. Select Cuisines</a></li>
                <li><a href="" class="text-left">3. Choose Restaurants</a></li>
                <li><a href="" class="text-left">Share-A-Meal!</a></li>
            </ul>-->
    	</div>
@stop

@section('content')
    <h2 class="text-center p-b-30 m-t-0 page-header">Hungry? Let's Get Started Quickly!</h2>
    {{ Form:: open(['route' => 'sessions.store', 'class' => 'form-horizontal']) }}
        <div class="form-group">
            {{ Form:: label('zipcode', 'Your ZipCode', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10 ">
                <div class="m-b-10">

                    {{ Form:: input('number','zipcode', null, ['class' => 'input-large input-light brad', 'required']) }}
                    {{ $errors->first('zipcode') }}
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {{ Form:: label('cuisine', 'Cuisines you would like eat today (Choose at least one)', ['class' => 'col-sm-2 control-label']) }}
        	<div class="col-sm-10 m-t-10">
        	    <div class="m-b-10">
        	        {{Form:: checkbox('french', 'french', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">French Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('italian', 'italian',false,  ['class' => 'icheck'])}}
        			<span class="m-l-10">Italian Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('chinese', 'chinese', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">Chinese Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('indian', 'indian', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">Indian Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('mexican', 'mexican', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">Mexican Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('lebanese', 'lebanese', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">Lebanese Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('japanese', 'japanese', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">Japanese Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('spanish', 'spanish', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">Spanish Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('greek', 'greek', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">Greek Cuisine</span>
        		</div>
        	    <div class="m-b-10">
        	        {{Form:: checkbox('american', 'american', false, ['class' => 'icheck'])}}
        			<span class="m-l-10">American Cuisine</span>
        		</div>
        	</div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                {{ Form:: submit('Get Restaurants', ['class' => 'btn btn-primary btn-lg']) }}
        	</div>
        </div>

@stop