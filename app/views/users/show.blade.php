@extends('layouts.master')

@section('header')


    <title>{{ $user->first_name }} {{ $user->last_name }}'s Profile</title>

     
@stop

@section('content')

<div class="container theme-showcase" role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div {{ ($user->cover) ? "class=\"jumbotron-profile\" style=\"background-image: url('$user->cover')\"" : 'class="jumbotron-profile cover"' }}>
        <div class="content text-center">
            <h1> {{$user->first_name}} {{$user->last_name}} </h1>

            <h3>Language: {{$user->native_language}}</h3>

            @if ($user->avatar)
                <div class="img-circle carousel profile-img">
                    <img class="img-circle carousel profile-img" src="{{ $user->avatar }}" >
                </div>
            @else
                <div class="default-img img-circle carousel profile-img"></div>
            @endif

            @if(Auth::user()->id == $user->id)
                <button data-toggle="modal" type="button" data-target="#modal-avatar" class="btn btn-primary btn-lg fa fa-camera-retro user-pic"> &raquo;</button>
                <p id="about-style"><button data-toggle="modal" type="button" data-target="#modal-cover" class="btn btn-primary btn-lg fa fa-image"> &raquo;</button></p>
            @endif

            @if(!(Auth::user()->id == $user->id))
                <div class="container">
                    <a href="/unfollow/{{{$user->id}}}" class="btn btn-danger follow {{(Auth::user()->follow->contains($user->id)) ? '' : 'hide';}}">unfollow</a>
                    <a href="/follow/{{{$user->id}}}" class="btn btn-info follow {{(Auth::user()->follow->contains($user->id)) ? 'hide' : '';}}">follow</a>
                </div>
            @endif
        </div>
    </div>
    
    <!-- User Posting ability -->
    <div class="row">
        <div class="col-md-3">
            <div class="guidebar-profile list-group">
                <a href="/home?language=english" class="list-group-item"><img src="/img/flag-american.png" class="img-responsive"></a>
                <a href="/home?language=spanish" class="list-group-item"><img src="/img/flag-canadia.png" class="img-responsive"></a>
                <a href="/home?language=french" class="list-group-item"><img src="/img/flag-mexico.png" class="img-responsive"></a>
            </div>
                <div class="PostButton">
                <button data-toggle="modal" type="button" data-target="#modal-newpost" class="btn btn-primary btn-lg"> Write A New Post!</button>
                
                @if(Auth::user()->id == $user->id)
                    <button href="#" data-toggle="modal" type="button" data-target="#modal-delete" style="text-align:left" class="btn btn-danger btn-lg list-group-item">Delete Profile</button>
                @endif
                
                <button href="/home" class="list-group-item active">View Posts</button>
            </div>
        </div>
        
        <!-- --------------------- Displaying Posts and Comments --------------------- -->
        <div class="col-md-9">
            @foreach($user->posts as $post)
                <div class="row posts">
                    <div class="col-md-4">
                        <div class="default-img img-circle post-img"></div>
                        <h4>{{{ $post->user->first_name }}} {{{ $post->user->last_name }}}</h4>
                    </div>
                    <div class="col-md-8 post-content"> 
                        <h4 data-lang="{{{ $post->i18n }}}" id="post-{{{ $post->id }}}">{{{ $post->content }}}</h4>
                    </div>

                    <button type="button" class="btn btn-danger follow btn-sm {{{ $post->isLiked() ? '' : 'hide' }}} likes comments">unlike</button>
                    <button type="button" class="btn btn-info follow btn-sm {{{ $post->isLiked() ? 'hide' : '' }}} likes comments">like</button>

                    <button data-toggle="modal" type="button" data-target="#modal-{{{ $post->id }}}" class="btn btn-primary btn-sm comments">Comment</button>

                    <button type="button" class="btn btn-success btn-sm translate-btn" data-post-id="{{{ $post->id }}}">Translate with Google</button>

                    @if(Auth::user()->id == $user->id)
                        <button type="button" data-toggle="modal" data-target="#modaledit-{{{ $post->id }}}" class="btn btn-primary btn-sm comments">Edit</button>
                
                        {{Form::open(['method' => 'delete', 'action' => ['PostsController@destroy', $post->id]])}}
                            <button type="submit" class="btn btn-danger btn-sm comments">Delete</button>
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
                

<!-- --------------------- Modal For Creating Comments --------------------- -->
    
        <div class="container">
            <div id="modal-{{{ $post->id }}}" class="modal fade lg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Leave Your Comment</h4>
                        </div>

                        {{ Form::open(array('action' => 'PostsController@createComment', 'class' => 'form-inline', 'role' => 'form')) }}

                        <div class="modal-body">
                            {{ Form::textarea('comment', null , array('class' => 'span12 form-control', 'placeholder' => 'Insert comment here', 'rows' => '5'))}}
                        </div>

                        <div class="modal-footer">
                            <div class="btn-group">
                                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                                {{ Form::hidden('post_id', $post->id) }}
                                {{ Form::submit('Comment', array('class' => 'btn btn-primary')) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->
        </div>
<!-- --------------------- Modal End --------------------- -->




<!-- --------------------- Modal for Editing Post --------------------- -->

        <div class="container">
            <div id="modaledit-{{{ $post->id }}}" class="modal fade lg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Your Post</h4>
                        </div>

                        {{ Form::open(array('action' => ['PostsController@update', $post->id], 'class' => 'form-inline', 'role' => 'form', 'method' => 'put')) }}

                        <div class="modal-body">
                            {{ Form::textarea('content', null , array('class' => 'span12 form-control', 'placeholder' => 'Update post here', 'rows' => '5'))}}
                        </div>

                        <div class="modal-footer">
                            <div class="btn-group">
                                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                                {{ Form::hidden('post_id', $post->id) }}
                                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->
        </div>
<!-- --------------------- Modal End --------------------- -->
            @endforeach
        </div>
    </div>
</div>
<!-- --------------------- End --------------------- -->

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
                    </div>
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
</div>
<!-- --------------------- Modal End --------------------- -->
     
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
                    </div>
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
</div>
<!-- --------------------- Modal End --------------------- -->


<!-- --------------------- Modal for new post --------------------- -->

        <div class="container">
            <div id="modal-newpost" class="modal fade lg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h3>Write A New Post</h3>
                            {{ Form::open(array('action' => 'PostsController@store', 'role' => 'form')) }}
                            <div class="form-group">
                                {{ Form::textarea('content', null , array('class' => 'form-control', 'required' => 'required','placeholder' => 'Write a new post', 'rows' => '5'))}}
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select required="required" class="form-control" id="language" name="language" >
                                        <option value="">Language</option>
                                        <option value="1" >English</option>
                                        <option value="2" >French</option>
                                        <option value="3" >Spanish</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <div class="form-group">
                                <h5 class="tags">Create Tags</h5>
                                <input id="tags" class="tags" rows="5" name='tags' placeholder="Create tags">
                                {{Form::submit('Post', array('class' => 'btn btn-default'))}}
                            </div>
                        {{ Form::close() }}
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->
        </div>
<!-- --------------------- Modal end --------------------- -->





<!-- --------------------- Modal For Deleting User --------------------- -->
<div class="container">
    <div id="modal-delete" class="modal fade lg" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h3>Are you sure you want to delete your profile?</h3>
                    {{Form::open(['method' => 'Delete', 'action' => ['UsersController@destroy', Auth::user()->id], 'id' => 'delete-form'])}}
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger btn-md">Delete</button>
                    {{Form::close()}}
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
</div>
                        
<!-- --------------------- End --------------------- -->







<!-- --------------------- Modal for translate --------------------- -->

        <div class="container">
            <div id="modal-translate" class="modal fade lg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p class="translated"></p>
                        </div>
                            
                        <div class="modal-footer">
                            <div class="btn-group">
                                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->
        </div>
<!-- --------------------- Modal End --------------------- -->

</div>



@stop
@section('bottom-script')
<script src="/js/following.js"></script>
<script src="/js/jquery.tagsinput.js"></script>

<script type="text/javascript">
            $('#tags').tagsInput({
                    "width": "75%",
                    "height": "70px",
                    'defaultText':''
            }); 
</script>

<script type="text/javascript">
    
    $(document).ready(function() {
        $('.translate-btn').click(function() {
            var userLang = "{{{ Auth::user()->i18n }}}";
            var postId   = $(this).data('post-id');
            var $post    = $("#post-" + postId);
            var postLang = $post.data('lang');
            var content  = $post.text();

            $.ajax({
                method: 'get',
                url: 'https://www.googleapis.com/language/translate/v2',
                data: {
                    key: 'AIzaSyB8ZnHXraNbVNUpQMuez5cpoSh0lF4uetw',
                    source: postLang,
                    target: userLang,
                    q: content
                },
                success: function(data) {
                    // maybe pop up a modal
                    $('.translated').html(data.data.translations[0].translatedText);
                    $('#modal-translate').modal();
                },
                error: function() {
                    $('.translated').html("Text already in native language");
                    $('#modal-translate').modal();
                }
                
            });
        });
    });
</script>

@stop
