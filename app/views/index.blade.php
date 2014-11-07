@extends('layouts.default')

@section('title')
    <title>Welcome to Share a Meal</title>
@stop

@section('styling')
    <link rel="stylesheet" href="/css/index.css">
@stop

@section('content')
		<div class="block-absolute-center login-form">

			<div class="text-center m-b-10">
			    <img src="/images/logo.png" class="logo">

				<!-- <img src="http://placehold.it/200x90"> -->
                <!--<h2 class="text-white font-w-100">Share-a-Meal</h2>-->
			</div>
			{{ Form:: open(['class' => 'form-horizontal']) }}
			  <div class="form-group">
			    {{ Form:: text('zipcode', null, ['class' => 'form-control center', 'placeholder' => 'ZipCode']) }}
			  </div>
			  {{ Form:: submit('Get Started', ['class' => 'btn btn-primary btn-block btn-lg']) }}


		</div>
@stop

@section('footer')
    <script>
      $(".backstretch").backstretch([
        //"backgrounds/wg_blurred_backgrounds_4.jpg",
        //"backgrounds/wg_blurred_backgrounds_1.jpg",
        "backgrounds/wg_blurred_backgrounds_3.jpg",
        //"backgrounds/wg_blurred_backgrounds_8.jpg",
        //"backgrounds/wg_blurred_backgrounds_5.jpg"
      ], {
        duration: 2000,
        fade: 'slow'
      });
    </script>
@stop