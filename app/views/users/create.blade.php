@extends('layouts.default')


@section('title')
    <title>Register with Share-A-Meal</title>
@stop

@section('styling')
    <link rel="stylesheet" href="/css/register-override.css">
@stop

@section('content')
    	<div class="container">
          <div class="signup">
            <div class="row">

              <div class="visible-xs text-center">

              </div>

              <div class="col-sm-8 text-white hidden-xs">

                <div class="p-30">
                  <img src="/images/logo.png" class="logo">


                  <p>Share-A-Meal is a website for you to search for restaurants and to share a meal with someone near you!</p>

                  <ul class="unstyled checkmarked">
                    <li>Search for Restaurants</li>
                    <li>Connect with people</li>
                    <li>Save money</li>
                    <li>And obviously Share-A-Meal!!</li>
                  </ul>

                </div>

              </div>

              <div class="col-sm-4">
                <div class="m-t-30">
                  <div class="p-t-30">
                    {{ Form:: open(['route' => 'users.store']) }}
                      <div class="form-group">
                        {{ Form:: email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
                      </div>
                      <div class="form-group">
                        {{ Form:: password("password" , ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
                      </div>
                      <div class="form-group">

                        <div class="m-b-10">
                            {{Form:: radio("gender", "male", false,  ['class' => 'icheck', 'required'])}}
                        	<span class="m-l-10 text-white">Male</span>

                        </div>
                        <div class="m-b-10">
                            {{Form:: radio("gender", "female", false,  ['class' => 'icheck', 'required'])}}
                            <span class="m-l-10 text-white">Female</span>
                        </div>
                      </div>
                      {{ Form:: submit('Register', ['class' => 'btn btn-primary btn-block btn-lg']) }}
                    {{Form::close()}}
                  </div>
                  {{ link_to('/', 'Already have an account?', ['class' => 'text-white hover-opacity-change hover-white-opacity-text m-t-10 d-block']) }}

                </div>
              </div>

            </div>
          </div>
        </div>
@stop

@section('footer')
    <script>
      $(".backstretch").backstretch([
        //"backgrounds/wg_blurred_backgrounds_4.jpg",
        //"backgrounds/wg_blurred_backgrounds_1.jpg",
        "backgrounds/wg_blurred_backgrounds_11.jpg",
        //"backgrounds/wg_blurred_backgrounds_8.jpg",
        //"backgrounds/wg_blurred_backgrounds_5.jpg"
      ], {
        duration: 2000,
        fade: 'slow'
      });
    </script>
@stop
