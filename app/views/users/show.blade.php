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
    
    
    
.modal .modal-header {
  border-bottom: none;
  position: relative;
}
.modal .modal-header .btn {
  position: absolute;
  top: 0;
  right: 0;
  margin-top: 0;
  border-top-left-radius: 0;
  border-bottom-right-radius: 0;
}
.modal .modal-footer {
  border-top: none;
  padding: 0;
}
.modal .modal-footer .btn-group > .btn:first-child {
  border-bottom-left-radius: 0;
}
.modal .modal-footer .btn-group > .btn:last-child {
  border-top-right-radius: 0;
}
    
    
    </style>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    // $(document).ready(function() 
    // {
    //     function translate()
    //     {
    //         $.get("https://www.googleapis.com/language/translate/v2",
    //         {
    //             key:"AIzaSyDgydXTWspIfKggxymxfDh0VcyvdEMrGAc",
    //             source:"en",
    //             target:$("#target").val(),
    //             q:$("#text").val()
    //         },
    //         function(response)
    //         {
    //             $("#translated").html(response.data.translations[0].translatedText);
 
    //         },"json") .fail(function(jqXHR, textStatus, errorThrown) 
    //         {
    //             alert( "error :"+errorThrown );
    //         });
    //     }
    // });
    
    </script>
    
    
@stop

@section('content')

    <div class="container theme-showcase" role="main">


  <!-- Main jumbotron for a primary marketing message or call to action -->
   <div class="jumbotron-profile">
      <div class="content">
        <h1 id='h1-profile'> Welcome {{$user->first_name}}!</h1>
        <p id='p-profile'>This is a place where you can place your favorite quote/song title/bio.</p>
        <img src="/img/toy-story-alien2.jpg" alt="Toy Story Alien" class="img-thumbnail">

        </p>
        
      </div>
   </div>



  <!-- User Posting ability -->
  <div class="guidebar-profile list-group col-xs-3">
    <a href="#" class="list-group-item active">View Posts</a>
    <a href="#" class="list-group-item">English</a>
    <a href="#" class="list-group-item">Spanish</a>
    <a href="#" class="list-group-item">French</a>
  </div>

  {{ Form::open(array('action' => 'PostsController@store', 'class' => 'form-inline', 'role' => 'form')) }}
  <div class="posts-container-profile col-xs-8">
    <h1>Write A New Post</h1>
     <div>
        {{ Form::textarea('content', null , array('class' => 'span12 form-control', 'placeholder' => 'Write a new post', 'rows' => '5'))}}
    </div>
    {{Form::submit('Post', array('class' => 'span12 form-control', 'rows' => '5'))}}
  </div>
      
    {{ Form::close() }}

    @forelse($user->posts as $post)
    
        <div class="postings">

            <p type="text" id="translated" class="posts"> 
                <span id="text"> {{ $post->content }}</span> 

            <br>
                
                <button type="button" class="btn btn-group-xs likes">Like</button>

                <button data-toggle="modal" type="button" data-target="#modal-1" class="btn btn-primary btn-group-xs comments">Comment</button>
           
            <div class="container">
                <div class="row">
                    <div id="modal-1" class="modal" tabindex="-1" role="dialog">

                        <div class="modal-dialog">
                            <div class="modal-content">
                 
                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Leave Your Comment</h4>

                                </div>
                                <div class="modal-body">
                                    {{ Form::open(array('action' => 'PostsController@store', 'class' => 'form-inline', 'role' => 'form')) }}
                                    {{ Form::textarea('comment', null , array('class' => 'span12 form-control', 'placeholder' => 'Insert comment here', 'rows' => '3'))}}
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group">
                                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" action=" {{action('PostsController@create')}} ">Save changes</button>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dalog -->
                    </div><!-- /.modal -->
                </div>
            </div>


            <br>
                <!-- <strong>Translate into:</strong> 
                <select id="target">
                    <option value="en">English</option>
                    <option value="es">Spanish</option>
                    <option value="fr">French</option>
                </select>
                <input type="button" value="Translate"  onclick="translate()" />
            </p> -->
            
            
            
            
        </div>
    @empty
        <div>
            <p class="posts">You haven't Written any posts yet...</p>
        </div>
    @endforelse
</div>

@stop
