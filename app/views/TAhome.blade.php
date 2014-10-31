@extends('layouts.master')

@section('header')
    <title>Home</title>

@stop

@section('content')
<div class="container" role="main">
    <div class="row top">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">Home</a>
                <a href="#" class="list-group-item">English</a>
                <a href="#" class="list-group-item">French</a>
                <a href="#" class="list-group-item">Spanish</a>
            </div>
        </div>

        <div class="col-md-offset-1 col-md-8">
            
            <!-- Post Form Row -->
            <div class="row">
                <div class="col-xs-12">
                    <h4>Write A New Post</h4>
                    {{ Form::open(array('action' => 'PostsController@postHome', 'role' => 'form')) }}
                        <div class="form-group">
                            {{ Form::textarea('content', null , array('class' => 'form-control', 'placeholder' => 'Write a new post', 'rows' => '5'))}}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Post', array('class' => 'btn btn-default'))}}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>

            <!-- News Feed Row(s) -->
            <div class="row">
                <div class="posts col-md-12">
                    <div class="pull-left">
                    @forelse($posts as $post)
                        <div class="default-img img-circle post-img"></div>
                        <h4 class="text-center"> {{ $post->user->first_name }} {{ $post->user->last_name }}</h4>
                    </div>
                        <h4> {{ $post->content }}</h4>
                        
                        @forelse($post->comments as $comment)
                        <p>{{ $comment->content }}</p>
                        @empty
                        @endforelse
                        @if(Auth::user()->likes->contains($post->id))
                            <button type="button" href="/unlike/{{$post->id}}" class="btn btn-danger follow btn-group-xs likes">unlike</button>
                            <button type="button" href="/like/{{$post->id}}" class="btn btn-info follow hide btn-group-xs likes">like</button>
                        @else
                            <button type="button" href="/unlike/{{$post->id}}" class="btn btn-danger follow hide btn-group-xs likes">unlike</button>
                            <button type="button" href="/like/{{$post->id}}" class="btn btn-info follow btn-group-xs likes">like</button>
                        @endif
                        <button data-toggle="modal" type="button" data-target="#modal-1" class="btn btn-primary btn-group-xs comments">Comment</button>

                        @forelse($post->comments as $comment)
                        <p>{{ $comment->content }}</p>
                            
                        @empty
                        @endforelse
                        

                        <br>
                        </div>
                        <div class="container">
                                <div id="modal-1" class="modal fade lg" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Leave Your Comment</h4>
                                            </div>
                                            {{ Form::open(array('action' => 'HomeController@createComment', 'class' => 'form-inline', 'role' => 'form')) }}
                                            <div class="modal-body" >
                                                {{ Form::textarea('comment', null , array('class' => 'span12 form-control', 'placeholder' => 'Insert comment here', 'rows' => '5', 'width' => '100%'))}}
                                            <div class="modal-footer">
                                                <div class='container'>
                                                <div>
                                                    <input id="tags" rows="5" placeholder="Create tags"></input>
                                                </div>
                                        </div>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                                                    {{ Form::hidden('post_id', $post->id) }}
                                                    {{ Form::submit('Comment', array('class' => 'btn btn-primary')) }}
                                            {{ Form::close() }}
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dalog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                </div>
                    @empty
                            
                    @endforelse
                    
                </div>
            </div>

        </div><!-- /.col-lg-8 -->
    </div><!-- /.row -->
</div>


@stop

@section('bottom-script')
        <script src="/js/jquery.tagsinput.js"></script>
        <script src="/js/following.js"></script>
        <script type="text/javascript">
            $('#tags').tagsInput({
                    "width": "75%",
                    "height": "70px",
                    'defaultText':''
            }); 
        </script>
        
@stop



