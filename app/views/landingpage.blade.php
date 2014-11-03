@extends('layouts.master')

@section('header')
    <title>SkyLanguage</title>
@stop

@section('content')
    <div class="container" role="main">
        <div class="row top">
            <div class="col-md-6">
                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron text-center" id="landing-jumbotron">
                    <div>
                        <h1>Welcome!</h1>
                        <p>This is SkyLanguage, where the sky is the limit on language learning!<br>
                            SkyLanguage is a user friendly, fun environment for language learning.<br>
                            Sign up and try it out!</p>
                        <p>
                            <a href="{{ action('HomeController@showAbout') }}" id="about"class="btn btn-primary btn-lg" role="button">About us &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="labels-landing">Sign up!</h2>
                {{ Form::open(array('action' => 'UsersController@store', 'class' => 'form-horizontal'))}}
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="sr-only" for="exampleInputFirstName2">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="exampleInputFirstName2" placeholder="First Name" value="{{{ Input::old('first_name') }}}">
                        </div>
                        {{ $errors->first('first_name', '<span class="help-block">:message</span>')}}
                        <div class="col-md-6">
                            <label class="sr-only" for="exampleInputLast Name2">LastName</label>
                            <input type="text" class="form-control" name="last_name" id="exampleInputLastName2" placeholder="Last Name" value="{{{ Input::old('last_name') }}}">
                        </div>
                        {{ $errors->first('last_name', '<span class="help-block">:message</span>')}}
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="exampleInputEmail2">Email</label>
                            <input type="email" class="form-conrol" name="email" id="inputEmail3" placeholder="Email" value="{{{ Input::old('email') }}}">
                        </div>
                    </div>
                        {{ $errors->first('email', '<span class="help-block">:message</span>')}}

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" value="{{{ Input::old('password') }}}">
                        </div>
                        {{ $errors->first('password', '<span class="help-block">:message</span>')}}
                    </div>
                    <h4>Birthday</h4>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <select class="form-control" id="bday-year" name="b_year" required>
                                <option selected>Year</option>
                                @for ($i=2010; $i >= 1950; $i--)
                                    <option>{{{ $i }}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <select class="form-control" id="bday-month" name="b_month" required>
                                <option>Month</option>
                                @for ($i=1; $i <= 12; $i++) 
                                    <option>{{{ $i }}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <select class="form-control" id="bday-day" name="b_date" required>
                                <option>Day</option>
                                @for ($i=1; $i <= 31; $i++) 
                                    <option>{{{ $i }}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <h4>Language</h4>
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control" id="language" name="language" required>
                                <option selected>Language</option>
                                <option value="English" >English</option>
                                <option value="French" >French</option>
                                <option value="Spanish" >Spanish</option>
                            </select>
                        </div>
                    </div> 

                    <h4>Gender</h4>
                    <div class="form-group" required>
                        <div class="col-md-2 col-xs-6">
                            <label>
                                <input type="radio" name="gender" id="inlineRadio1" value="F"> Female
                            </label>
                        </div>
                        <div class="col-md-2 col-xs-6">
                            <label>
                                <input type="radio" name="gender" id="inlineRadio2" value="M"> Male
                            </label>
                        </div>
                    </div>

                    <!-- Sign Up Button -->
                    <div class="form-group">
                        <div class="col-xs-12">
                          <label class="sr-only" for="exampleInputSignUp2">Sign Up</label>
                          <button type="submit" class="btn btn-lg btn-success" id="sign-up_btn-landing">Sign Up</button>
                        </div>
                    </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
@stop
