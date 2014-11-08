@extends('layouts.default')

@section('title')
    <title>Welcome to Share a Meal</title>
@stop

@section('styling')
    <link rel="stylesheet" href="/css/index-override.css">
@stop

@section('content')
		<div class="block-absolute-center login-form">

			<div class="text-center m-b-10">
			    <img src="/images/logo.png" class="logo">

				<!-- <img src="http://placehold.it/200x90"> -->
                <!--<h2 class="text-white font-w-100">Share-a-Meal</h2>-->
			</div>
            {{ Form:: open(['route' => 'accounts.store']) }}
                <div class="form-group">
                    {{ Form:: email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form:: password("password" , ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
                 </div>
                 {{ Form:: submit('Login', ['class' => 'btn btn-primary btn-block btn-lg']) }}
            {{ link_to('/register', 'Don\'t have an account?', ['class' => 'text-white hover-opacity-change center hover-white-opacity-text m-t-10 d-block']) }}
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