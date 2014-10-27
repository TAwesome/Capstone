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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet"> -->

    <title>About Jill</title>

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
            @if (Auth::check())
            <li><a href="{{ action('UsersController@show') }}">Profile</a></li>
            @endif
            <li class="active"><a href="#about">About</a></li>
            <li><a href="{{ action('UsersController@index') }}">Contact Us</a></li>
            <li><a href="#">Logout</a></li>
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

        </div><!--/.nav-collapse -->
      </div>
    </div>



    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">

        <div class="col-xs-offset-3 col-xs-6">
          <img class="img-circle" src="img/Jillian.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Jillian Donovan</h2>
          <p>Cat ipsum dolor sit amet, chase mice. Poop on grasses scamper behind the couch, so leave hair everywhere jump off balcony, onto stranger's head. Pooping rainbow while flying in a toasted bread costume in space. Shake treat bag sleep in the bathroom sink, and chase ball of string missing until dinner time. Missing until dinner time leave hair everywhere rub face on everything. Intently stare at the same spot. Peer out window, chatter at birds, lure them to mouth all of a sudden cat goes crazy, for stretch, or swat at dog find something else more interesting, and cat snacks, or meow all night having their mate disturbing sleeping humans. Loves cheeseburgers hunt by meowing loudly at 5am next to human slave food dispenser vommit food and eat it again burrow under covers, so throwup on your pillow, for stretch. Stretch destroy couch rub face on everything, bathe private parts with tongue then lick owner's face play time, for give attitude, and chase ball of string. Loves cheeseburgers hack up furballs and stick butt in face, so plan steps for world domination who's the baby, so present belly, scratch hand when stroked, intrigued by the shower. Run in circles has closed eyes but still sees you. Chew foot stick butt in face hate dog. 
          </p>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->

    </div><!-- /.container -->


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bootstrap/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
