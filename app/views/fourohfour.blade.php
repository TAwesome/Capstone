@extends('layouts.master')

@section('header')


    <title>{{ $user->first_name }} {{ $user->last_name }}'s Profile</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="author" href="https://plus.google.com/u/0/109859280204979591787/about"/>


        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <style type="text/css">
			body {
				font-family: 'Open Sans', sans-serif;
			}
		</style>
     
@stop

@section('content')

    <body class="loading top">

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

@stop
