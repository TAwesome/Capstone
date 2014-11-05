
@extends('layouts.master')

@section('header')
        <title>Page Not Found</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="author" href="https://plus.google.com/u/0/109859280204979591787/about"/>
        <style type="text/css">
            body {
                font-family: 'Open Sans', sans-serif;
                padding-top: 70px;
            }
            .error {
                text-align: center;
            }
            .video {
                margin-left: 23%;
            }
        </style>
        
        <script>

            $(document).ready(function() 
            {
                $(".video").html("<iframe width='560' height='315' src='//www.youtube.com/embed/s9shPouRWCs?rel=0&autoplay=1' frameborder='0' allowfullscreen></iframe>");
                
            });
        
        </script>
@stop


@section('content')


<h2 class="error">Sorry, The page you are looking for cannot be found... :(</h2>

<h4 class="error">Here's a happy little video for you instead</h4>
<div class="language">
    <p class='video'></p>
</div>

@stop

@section('bottom-script')

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>


@stop
