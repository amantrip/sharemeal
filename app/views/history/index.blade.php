@extends('layouts.home')

@section('title')
    <title>Match History</title>
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
    <h2 class="text-center p-b-30 m-t-0 page-header">Your Previous Matches</h2>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Restaurant</th>
                            <th>Matched User</th>
                            <th>Matched User Gender</th>
                            <th>Block User?</th>
                            <th>When?</th>
                            <th>Edit Entry</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($history as $entry)
                            <tr class="">
                                <td>{{$entry->restaurant_id}}</td>
                                <td>{{ User::find($entry->matched_id)->email }}</td>
                                <td>{{ User::find($entry->matched_id)->gender }}</td>
                                <td>{{$entry->ban}}</td>
                                <td>{{$entry->created_at}}</td>
                                <td class="center">{{ link_to("/history/edit/{$entry->id}", "Edit") }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop