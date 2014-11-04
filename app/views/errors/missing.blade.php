<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>404:Page Not Found</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		    <link rel="author" href="https://plus.google.com/u/0/109859280204979591787/about"/>


        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="/TAwesome.css">
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <style type="text/css">
    			body {
    				font-family: 'Open Sans', sans-serif;
    			}
    		</style>
    </head>
    <body class="loading">
    	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <img src="/img/skylanguageLogo.png" alt="SkyLanguage">
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::check())
                <a class="navbar-brand" href="{{ action('HomeController@showHome') }}">SkyLanguage</a>
                @else
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
                            <li><a href="{{ action('UsersController@show', Auth::id()) }}">Profile</a></li>
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
                <!-- Search Row -->
                <!-- <div class="form-group">
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group-addon glyphicon glyphicon-search"></div>
                            <input type="text" class="form-control" name="email" placeholder="Search">
                        </div>
                    </div>
                </div> -->
                @if (Auth::check())
                <form class="navbar-form navbar-left" role="search" method='GET' action="{{ action('UsersController@index')}}">
                    <div class="form-group">
                      <input type="text" id='search' class="form-control" name='search' placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                @endif
            </div><!--/.nav-collapse -->
        </div>
    </div>

       	<div id="preload">
	       	<img src="img/bcg_slide-1.jpg">
	       	<img src="img/bcg_slide-2.jpg">
	       	<img src="img/bcg_slide-3.jpg">
	       	<img src="img/bcg_slide-4.jpg">
       	</div>
       	
       	<main>
       	 
	        <section id="slide-1" class="homeSlide">
	        	<div class="bcg">
		        	<div class="hsContainer">
			    		<div class="hsContent">
				    		<h2>Sorry, The Page you are looking for cannot be found... :(</h2>
			    		</div>
		        	</div>
	        	</div>
		    </section>
		    
		</main>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/imagesloaded.js"></script>
        <script src="js/skrollr.js"></script>
        <script src="js/_main.js"></script>

    </body>
</html>
