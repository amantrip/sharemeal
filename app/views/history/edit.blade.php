@extends('layouts.home')

@section('title')
    <title>Edit Match History</title>
@stop

@section('styling')
    <link rel="stylesheet" href="/css/sessions-override.css">
@stop


@section('sidebar')
   		<div class="sidebar bg-gray-dark text-white text-center pushy pushy-left">

   			<hr class="no-margin">
   			<hr>
   			<ul class="unstyled nav">
   				<li class=""><a href="/sessions" class="text-left">Dashboard</a></li>
   				<li class="active">
   					<a href="" class="text-left">
   						Match History
   						<span class="badge bg-blue-light pull-right text-gray-dark brad-small"></span>
   					</a>
   				</li>
   			</ul>

   		</div>

@stop

@section('content')
    <h2 class="text-center p-b-30 m-t-0 page-header">Edit History</h2>
    <div class="row">
        <p class="m-b-30 p-b-30 text-gray-alt text-uppercase text-center col-lg-8 col-lg-offset-2">We let you ban a user you don't want to get matched with again. If you change your mind, you can always revert.</p>
    </div>
    {{ Form:: open(['action' => 'HistoryController@editHistory', 'class' => 'form-horizontal']) }}
        {{ Form::hidden('id', $entry->id) }}
        <div class="form-group">
            {{ Form:: label('restaurant', 'Restaurant', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10 ">
                <div class="m-b-10">
                    {{ Form:: label('restaurant', $entry->restaurant_id, ['class' => 'col-sm-2 control-label']) }}
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {{ Form:: label('created_at', 'When?', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10 ">
                <div class="m-b-10">
                    {{ Form:: label('created_at', $entry->created_at , ['class' => 'col-sm-2 control-label']) }}
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {{ Form:: label('matched_email', 'Matched User', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10 ">
                <div class="m-b-10">
                    {{ Form:: label('matched_email', User::find($entry->matched_id)->email, ['class' => 'col-sm-2 control-label']) }}
                </div>
            </div>
        </div>
        <hr>
        <div clas="form-group">
            {{ Form:: label('ban', 'Block User?', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10 ">
                <div class="m-b-10">
                    <div class="m-b-10">
                        {{Form:: radio("ban", "yes", false,  ['class' => 'icheck', 'required'])}}
                        <span class="m-l-10">Yes</span>
                    </div>
                    <div class="m-b-10">
                        {{Form:: radio("ban", "no", true,  ['class' => 'icheck', 'required'])}}
                        <span class="m-l-10">No</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                {{ Form:: submit('Submit', ['class' => 'btn btn-primary btn-lg']) }}
                <a href="/history" class="btn btn-lg">Cancel</a>
        	</div>
        </div>

@stop