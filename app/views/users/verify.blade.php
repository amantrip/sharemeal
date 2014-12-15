@extends('layouts.default')

@section('title')
    <title>Share-A-Meal: Verify your email address</title>
@stop

@section('styling')
    <link rel="stylesheet" href="/css/index-override.css">
@stop

@section('content')
		<div class="block-absolute-center login-form">

			<div class="text-center m-b-10">
			    <img src="/images/logo.png" class="logo">
                <p class="text-white">We sent you an email with a verification code<br>Please enter the verification code here</p>
				<!-- <img src="http://placehold.it/200x90"> -->
                <!--<h2 class="text-white font-w-100">Share-a-Meal</h2>-->
			</div>
            {{ Form:: open(['action' => 'RegistrationController@verification']) }}
                <div class="form-group">
                    {{ Form:: text("accesscode", null,  ['class' => 'form-control', 'placeholder' => 'Access Code', 'required']) }}
                    {{ Form::hidden('email', Session::get('email')[0]) }}
                 </div>
                 {{ Form:: submit('Verify', ['class' => 'btn btn-primary btn-block btn-lg']) }}

		</div>
@stop

@section('footer')
    <script>
      $(".backstretch").backstretch([
        //"backgrounds/wg_blurred_backgrounds_4.jpg",
        //"backgrounds/wg_blurred_backgrounds_1.jpg",
        "backgrounds/wg_blurred_backgrounds_8.jpg",
        //"backgrounds/wg_blurred_backgrounds_8.jpg",
        //"backgrounds/wg_blurred_backgrounds_5.jpg"
      ], {
        duration: 2000,
        fade: 'slow'
      });
    </script>
@stop