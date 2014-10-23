@extends('layouts.master')

@section('header')

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


<script>
    $(document).ready(function()
        {
            
            $('#myModal').modal('show');

        });

</script>

<title>{{ $user->first_name }}'s Profile Page</title>

@stop

@section('content')

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
       <div class="jumbotron">
          <div class="content">
            <h1>Hello {{ $user->first_name }}!</h1>
            <p>This is a place where you can place your favorite quote/song title/bio.</p>
            <img src="/img/toy-story-alien2.jpg" alt="Toy Story Alien" class="img-thumbnail">
            <p id="about-style"><a href="#" id="about"class="btn btn-primary btn-lg" role="button">Change Avatar &raquo;</a></p>
          </div>
       </div>

      <!-- User Posting ability -->
      <div class="guidebar list-group col-sm-3">
        <a href="#" class="list-group-item active">View Posts In:</a>
        <a href="#" class="list-group-item">English</a>
        <a href="#" class="list-group-item">Spanish</a>
        <a href="#" class="list-group-item">French</a>
        
      </div>
      
      <!-- Button trigger modal -->
        <button id="modalOpen"class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Create Post
        </button>

        <!-- Modal -->
        <div class="modal fade" class="hide" data-backdrop="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="savepost" type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      <div class="posts-container col-sm-8">
         <div>
            <input type="text" class="form-control" placeholder="Try a new Language!">
        </div>
      </div>

    </div>
    
    <div class="container">
    
@stop

@section('footer')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

@stop
