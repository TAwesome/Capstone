<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/TAwesome.css">

    <!-- Custom styles for this template -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/font_awesome/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">


    <style>
    
    body {
        margin-top: 70px;
    }
      
    </style>
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
          <a class="navbar-brand" href="{{ action('HomeController@showWelcome') }}">SkyLanguage</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="{{ action('HomeController@showAbout') }}">About</a></li>
            <li><a href="{{ action('HomeController@showContact') }}">Contact Us</a></li>
            
            @if (Auth::check())
            <li><a href="{{ action('UsersController@show') }}">Profile</a></li>
            <li><a href="#">Messages <span class="badge">3</span></a></li>
            <li><a href="{{ action('HomeController@doLogout') }}">Logout</a></li>
            
            @else
              {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-inline', 'role' => 'form')) }}
                <div class="sign-in" style="margin-left: 670px; width: 500px; margin-top: 7px;">
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
                  {{Form::submit('Log In')}}
                </div>
              {{ Form::close() }}
            @endif

          </ul>
                    
        

        </div><!--/.nav-collapse -->
      </div>
    </div>

            @yield('content')



    </body>
    
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    @yield('bottom-script')
    
</html>
