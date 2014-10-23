<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="/TAwesome.css">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">


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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
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
          <a class="navbar-brand" href="{{ action('HomeController@showWelcome') }}">MyLanguage</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
<!--             <li><a href="#">Profile</a></li> -->
<!--             <li><a href="#">Messages <span class="badge">3</span></a></li> -->
            <li><a href="#about">About</a></li>
            <li><a href="{{ action('UsersController@index') }}">Contact Us</a></li>
            <!-- <li class="dropdown-nav">
              <a href="#" id="dropdown-nav" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
                    
        @if (Auth::check())
        
            <li>{{ link_to_action('HomeController@doLogout', 'Logout', array('class' => 'btn btn-default')) }} </li>
                    
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

        </div><!--/.nav-collapse -->
      </div>
    </div>

            @yield('content')



    </body>
    @yield('bottom-script')
</html>
