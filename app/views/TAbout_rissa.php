<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="/TAcontactus.css">

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

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet"> -->

    <title>Cover Template for Bootstrap</title>

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
            <li><a href="#">Messages <span class="badge">3</span></a></li>
            <li><a href="#about">About</a></li>
            <li class="active"><a href="{{ action('UsersController@index') }}">Contact Us</a></li>
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


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        
        <div class="col-xs-offset-3 col-xs-6">
          <img class="img-circle" src="img/Rissa.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Rissa Waters</h2>
          <p>Applicake halvah sesame snaps muffin. Gummies powder donut caramels biscuit tart topping. Donut sesame snaps tiramisu. Cotton candy cotton candy gummi bears sesame snaps sweet roll biscuit. Gummies candy carrot cake sweet roll. Dessert cake bear claw croissant. Apple pie sesame snaps sweet roll bonbon liquorice lemon drops chocolate cake chocolate tiramisu. Applicake sweet roll tiramisu. Gummi bears caramels chocolate chocolate bar jelly-o lollipop danish muffin chupa chups. Powder bear claw pastry applicake jelly unerdwear.com powder gingerbread. Caramels jelly soufflé bear claw oat cake. Sweet roll lemon drops candy topping sesame snaps lemon drops cupcake. Cheesecake bonbon brownie chupa chups brownie dragée. Chocolate sweet roll fruitcake danish. Cotton candy liquorice sesame snaps dessert jelly-o cupcake chocolate jelly caramels. Jelly beans sesame snaps candy pudding candy marzipan brownie tiramisu dragée. Applicake cupcake carrot cake jelly-o pudding chupa chups pudding apple pie. Fruitcake bonbon unerdwear.com cotton candy icing ice cream. Jujubes candy canes brownie chocolate pudding marshmallow gingerbread chocolate cake. Tart liquorice tootsie roll cupcake chocolate cake muffin tootsie roll lemon drops. Caramels powder gummies. Gummi bears sweet sweet roll carrot cake liquorice tiramisu ice cream applicake. Bonbon cupcake brownie. Chupa chups carrot cake jelly-o sweet roll gummies.
          </p>
          
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->

    </div><!-- /.container -->


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
