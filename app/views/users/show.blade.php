<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="/TAprofile.css">

    <!-- Custom styles for this template -->
    <!-- <link href="cover.css" rel="stylesheet"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <title>{{ $user->first_name }}</title>
 
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
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Profile</a></li>
            <li><a href="#">Messages <span class="badge">3</span></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li class="dropdown-nav">
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
            </li>
          </ul>

<!--           <form class="form-inline" role="form">
            <div class="sign-in" style="margin-left: 670px; width: 500px; margin-top: 7px;">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">@</div>
                  <input class="form-control" type="email" placeholder="Enter email">
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-default">Sign in</button>
            </div>
          </form> -->

        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
       <div class="jumbotron">
          <div class="content">
            <h1> Welcome {{$user->first_name}} {{ $user->last_name }}!</h1>
            <p>This is a place where you can place your favorite quote/song title/bio.</p>
            <img src="/img/toy-story-alien2.jpg" alt="Toy Story Alien" class="img-thumbnail">
            <p id="about-style"><a href="#" id="about"class="btn btn-primary btn-lg" role="button">Cover photo! &raquo;</a></p>
          </div>
       </div>

      <!-- User Posting ability -->
      <div class="guidebar list-group col-xs-3">
        <a href="#" class="list-group-item active">View Posts</a>
        <a href="#" class="list-group-item">English</a>
        <a href="#" class="list-group-item">Spanish</a>
        <a href="#" class="list-group-item">French</a>
      </div>


      <div class="posts-container col-xs-8">
         <div>
            <input type="text" class="form-control" placeholder="Try a new Language!">
        </div>
      </div>

    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
