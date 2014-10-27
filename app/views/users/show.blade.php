@extends('layouts.master')

@section('header')

    <title>{{ $user->first_name }}</title>
    
    <style>

    .posts {
        width: 500px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        background-color: rgba(19, 130, 199, 0.2); 
        border-radius: 6px;
        
    }

    
    .likes {
        margin-bottom: 0;
        font-size: 12px;
        border: 1px solid rgba(0, 41, 252, 0.35);
        border-radius: 100px;
        margin: 5px;
        background-color: rgba(240, 248, 255, 0);
    }

    .comments {
        margin-bottom: 0;
        font-size: 12px;
        border: 1px solid rgba(0, 41, 252, 0.35);
        border-radius: 100px;
        margin: 5px;
        background-color: rgba(240, 248, 255, 0);
    }
    
    .ggl {
        margin: 5px;
        margin-bottom: 7px;
    }


    
    </style>
@stop

@section('content')

    <div class="container theme-showcase" role="main">


  <!-- Main jumbotron for a primary marketing message or call to action -->
   <div class="jumbotron">
      <div class="content">
        <h1> Welcome {{$user->first_name}}!</h1>
        <p>This is a place where you can place your favorite quote/song title/bio.</p>
        <img src="/img/toy-story-alien2.jpg" alt="Toy Story Alien" class="img-thumbnail">
        <p id="about-style"><a href=# id="about"class="btn btn-primary btn-lg" role="button">Cover photo! &raquo;</a></p>
      </div>
   </div>



  <!-- User Posting ability -->
  <div class="guidebar list-group col-xs-3">
    <a href="#" class="list-group-item active">View Posts</a>
    <a href="#" class="list-group-item">English</a>
    <a href="#" class="list-group-item">Spanish</a>
    <a href="#" class="list-group-item">French</a>
  </div>

  {{ Form::open(array('action' => 'PostsController@store', 'class' => 'form-inline', 'role' => 'form')) }}
  <div class="posts-container col-xs-8">
    <h1>Write A New Post</h1>
     <div>
        {{ Form::textarea('content', null , array('class' => 'span12 form-control', 'placeholder' => 'Write a new post', 'rows' => '5'))}}
    </div>
    {{Form::submit('Post', array('class' => 'span12 form-control', 'rows' => '5'))}}
  </div>
      
    {{ Form::close() }}

    </div>
    

    <div>
    @forelse($user->posts as $post)
    
        <div class="postings">
            <p class="posts"> {{ $post->content }} 
            <br>
                <button type="button" class="btn btn-group-xs likes">Like</button>
                <button type="button" class="btn btn-group-xs comments">Comment</button>
                <button type="button" class="btn btn-group-xs ggl">TRANSLATE</button>
            </p>
            
        </div>
    @empty
        <div>
            <p class="posts">You haven't Written any posts yet...</p>
        </div>
    @endforelse
</div>

@stop
