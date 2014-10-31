@extends('layouts.master')

@section('header')

    <title>{{ $user->first_name }} {{ $user->last_name }}'s Profile</title>

     
@stop

@section('content')

<div class="container theme-showcase" role="main">
  <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron-profile">
        <div class="content text-center">
            <h1> {{$user->first_name}} {{$user->last_name}} </h1>
            <div class="default-img img-circle carousel profile-img"></div>
            @if(Auth::user()->id == $user->id)
            <button data-toggle="modal" type="button" data-target="#modal-avatar" id="about" class="btn btn-primary btn-lg fa fa-camera-retro user-pic"> &raquo;</button>
            <p id="about-style"><button data-toggle="modal" type="button" data-target="#modal-cover" id="about" class="btn btn-primary btn-lg fa fa-image"> &raquo;</button></p>
            @endif

            @if(!(Auth::user()->id == $user->id))
                <div class="container">
                    <a href="/unfollow/{{{$user->id}}}" class="btn btn-danger follow {{(Auth::user()->follow->contains($user->id)) ? '' : 'hide';}}">unfollow</a>
                    <a href="/follow/{{{$user->id}}}" class="btn btn-info follow {{(Auth::user()->follow->contains($user->id)) ? 'hide' : '';}}">follow</a>
                </div>
            @endif
        </div>
    </div>
    
<!-- --------------------- Modal for avatar upload --------------------- -->

<div class="container">
    <div id="modal-avatar" class="modal fade lg" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                {{ Form::open(array('action' => 'UsersController@uploadAvatar', 'class' => 'form-inline', 'role' => 'form', 'files' => 'true')) }}

                <div class="modal-body">
                    {{ Form::label('image', 'Choose a new avatar!', ['class' => 'uploader']) }}
                    {{ Form::file('image', Input::file('image'), ['class' => 'uploader']) }}
                </div>

                <div class="modal-footer">

                    <div class="btn-group">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        {{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
</div>
        
        
<!-- --------------------- Modal for cover upload --------------------- -->

<div class="container">
    <div id="modal-cover" class="modal fade lg" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                {{ Form::open(array('action' => 'UsersController@uploadCover', 'class' => 'form-inline', 'role' => 'form', 'files' => 'true')) }}

                <div class="modal-body">
                    {{ Form::label('image', 'Choose a new cover photo!', ['class' => 'uploader']) }}
                    {{ Form::file('image', Input::file('image'), ['class' => 'uploader']) }}
                </div>

                <div class="modal-footer">

                    <div class="btn-group">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        {{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
</div>





  <!-- User Posting ability -->
    <div class="row">
        <div class="col-md-3">
            <div class="guidebar-profile list-group">
                <a href="#" class="list-group-item active">View Posts</a>
                <a href="#" class="list-group-item">English</a>
                <a href="#" class="list-group-item">Spanish</a>
                <a href="#" class="list-group-item">French</a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <h3>Write A New Post</h3>
                {{ Form::open(array('action' => 'PostsController@store', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::textarea('content', null , array('class' => 'form-control', 'placeholder' => 'Write a new post', 'rows' => '5'))}}
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control" id="language" name="language">
                                <option selected>Language</option>
                                <option value="1" >English</option>
                                <option value="2" >French</option>
                                <option value="3" >Spanish</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        {{Form::submit('Post', array('class' => 'btn btn-default'))}}
                    </div>
                {{ Form::close() }}
            </div>
        </div>

            

    @forelse($user->posts as $post)
    
        <div class="row">
            <div class="posts col-md-offset-3 col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="default-img img-circle post-img"></div>
                        <h4>{{{ $post->user->first_name }}} {{{ $post->user->last_name }}}</h4>
                    </div>
                    <div class="col-md-8 post-content"> 
                        <h4>{{{ $post->content }}}</h4>
                    </div>
                    @if(Auth::user()->id == $user->id)
                        {{link_to_action('PostsController@update','Edit', array($post->id))}}
                        
                        {{Form::open(['method' => 'Delete', 'action' => ['PostsController@destroy', $post->id], 'id' => 'delete-form'])}}
                            <button type="submit" class="btn btn-link">Delete</button>
                        {{Form::close()}}
                    @endif
                </div>
            @foreach($post->comments as $comment)
                <div class="row posts">
                    <div class="col-md-4">
                        <h4>{{{ $comment->user->first_name }}} {{{ $comment->user->last_name }}}</h4>
                    </div>
                    <div class="col-md-8">
                        <p>{{{ $comment->content }}}</p>
                    </div>
                </div>
                
            @endforeach
                        
                @if(Auth::user()->likes->contains($post->id))
                    <button type="button" href="/unlike/{{$post->id}}" class="btn btn-danger follow btn-group-xs likes">unlike</button>
                    <button type="button" href="/like/{{$post->id}}" class="btn btn-info follow hide btn-group-xs likes">like</button>
                @else
                    <button type="button" href="/unlike/{{$post->id}}" class="btn btn-danger follow hide btn-group-xs likes">unlike</button>
                    <button type="button" href="/like/{{$post->id}}" class="btn btn-info follow btn-group-xs likes">like</button>
                @endif
                    <button data-toggle="modal" type="button" data-target="#modal-1" class="btn btn-primary btn-group-xs comments">Comment</button>
            </div>
        </div>
            
        <div class="container">
            <div id="modal-1" class="modal fade lg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Leave Your Comment</h4>
                        </div>

                        {{ Form::open(array('action' => 'PostsController@createComment', 'class' => 'form-inline', 'role' => 'form')) }}

                        <div class="modal-body" value=""autofocus>
                            {{ Form::textarea('comment', null , array('class' => 'span12 form-control', 'placeholder' => 'Insert comment here', 'rows' => '5'))}}

                                             

                        </div>

                        <div class="modal-footer">

                            <div class="btn-group">
                                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                                {{ Form::hidden('post_id', $post->id) }}
                                {{ Form::submit('Comment', array('class' => 'btn btn-primary')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->
        </div>
    </div>
    @empty

    @endforelse
</div>

@stop
@section('bottom-script')

    <script src="/js/following.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

@stop
