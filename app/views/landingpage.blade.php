@extends('layouts.master')

@section('header')
    <title>SkyLanguage</title>
@stop


@section('content')
    <div class="container" role="main">
        <div class="row">
            <div class="col-md-6">
                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron text-center" id="landing-jumbotron">
                    <div>
                        <h1>Welcome!</h1>
                        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                        <p>
                            <a href="#" id="about"class="btn btn-primary btn-lg" role="button">About us &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="labels-landing">Sign up!</h2>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="sr-only" for="exampleInputFirstName2">First Name</label>
                            <input type="text" class="form-control" id="exampleInputFirstName2" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label class="sr-only" for="exampleInputLast Name2">LastName</label>
                            <input type="text" class="form-control" id="exampleInputLastName2" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="exampleInputEmail2">Email</label>
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <h4>Birthday</h4>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <select class="form-control" id="bday-year" name="bday-year">
                                <option selected>Year</option>
                                @for ($i=2010; $i >= 1950; $i--)
                                    <option>{{{ $i }}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <select class="form-control" id="bday-month" name="bday-month">
                                <option>Month</option>
                                @for ($i=1; $i <= 12; $i++) 
                                    <option>{{{ $i }}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <select class="form-control" id="bday-day" name="bday-day">
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
                            <select class="form-control" id="language" name="language">
                                <option selected>Language</option>
                                <option>English</option>
                                <option>French</option>
                                <option>Spanish</option>
                            </select>
                        </div>
                    </div> 

                    <h4>Gender</h4>
                    <div class="form-group">
                        <div class="col-md-2 col-xs-6">
                            <label>
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Female
                            </label>
                        </div>
                        <div class="col-md-2 col-xs-6">
                            <label>
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Male
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
