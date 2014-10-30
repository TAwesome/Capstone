<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom styles for this template -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/font_awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/TAwesome.css">

    @yield('header')
</head>
<body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::check())
                <a class="navbar-brand" href="{{ action('HomeController@showHome') }}">SkyLanguage</a>
                @else
                 (!Auth::check())
                <a class="navbar-brand" href="{{ action('HomeController@showWelcome') }}">SkyLanguage</a>
                @endif
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ action('HomeController@showHome') }}">Home</a></li>
                    <li><a href="{{ action('HomeController@showAbout') }}">About</a></li>
                    <li><a href="{{ action('HomeController@showContact') }}">Contact Us</a></li>
                    @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> User Options <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action('UsersController@show') }}">Profile</a></li>
                            <li><a href="{{ action('FollowsController@following') }}">Following</a></li>
                            <li><a href="{{ action('FollowsController@followers') }}">Followers</a></li>
                            <li><a href="{{ action('HomeController@doLogout') }}">Logout</a></li>
                        </ul>
                    </li>
                        
                    @endif
                </ul>
                @if(Auth::guest())
                    {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'navbar-form navbar-right', 'role' => 'form')) }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">@</div>
                                <input class="form-control" name="email" type="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                        <div class="form-group">
                            {{Form::submit('Log In', array('class' => 'btn btn-default'))}}
                        </div>
                    {{ Form::close() }}
                @endif
            </div><!--/.nav-collapse -->
        </div>
        <img class="logo" src="img/skylanguageLogo.png" alt="Sky Language Logo">
    </div>
    
    @yield('content')

   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   
     <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    @yield('bottom-script')
</body>    
</html>
