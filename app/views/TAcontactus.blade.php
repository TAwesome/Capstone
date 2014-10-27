@extends('layouts.master')

@section('header')
    <title>Contact Us</title>
@stop

@section('content')
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        
        
        
        
        <div class="col-lg-4">
          
          <img class="img-circle" src="img/Jacob.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Jacob Ernst</h2>
          <p><a href="https://github.com/Jacob-Ernst" role="button">Github</a></p>
          <p><a href="https://www.linkedin.com/pub/jacob-ernst/a3/3aa/497" role="button">Linkedin</a></p>
          <p><a href="https://twitter.com/ernst_je" role="button">Twitter</a></p>
          <p><a href="jacob.f.ernst@gmail.com" role="button">Email</a></p>
          <p><a class="btn btn-default" href="{{ action('HomeController@showJacob') }}" role="button">View details &raquo;</a></p>
        
        </div><!-- /.col-lg-4 -->
        
        
        
        <div class="col-lg-4">
          
          <img class="img-circle" src="img/Jillian.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Jillian Donovan</h2>
          <p><a href="https://github.com/Jbns89" role="button">Github</a></p>
          <p><a href="https://www.linkedin.com/pub/jill-donovan/a3/8a6/a1a/" role="button">Linkedin</a></p>
          <p><a href="https://twitter.com/JDonovan89" role="button">Twitter</a></p>
          <p><a href="jbns89@gmail.com" role="button">Email</a></p>
          <p><a class="btn btn-default" href="{{ action('HomeController@showJill') }}" role="button">View details &raquo;</a></p>
        
        </div><!-- /.col-lg-4 -->
        
        
        
        
        
        <div class="col-lg-4">
          
          <img class="img-circle" src="img/Rissa.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Rissa Waters</h2>
          <p><a href="https://github.com/rissa3896" role="button">Github</a></p>
          <p><a href="https://www.linkedin.com/pub/marissa-waters/a3/8a9/2a9" role="button">Linkedin</a></p>
          <p><a href="https://twitter.com/rissawaters3896" role="button">Twitter</a></p>
          <p><a href="rissa@rissawaters.com" role="button">Email</a></p>
          <p><a class="btn btn-default" href="{{ action('HomeController@showRissa') }}" role="button">View details &raquo;</a></p>
        
        </div><!-- /.col-lg-4 -->
      
      
      </div><!-- /.row -->

    </div><!-- /.container -->

@stop


