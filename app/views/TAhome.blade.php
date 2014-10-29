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
            <!-- Search Row -->
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Search</button>
                            </span>
                            <input type="text" class="form-control">
                        </div><!-- /input-group -->
                    </form>
                </div>
            </div>

            <!-- Post Form Row -->
            <div class="row">
                <div class="col-xs-12">
                    <h4>Write A New Post</h4>
                    {{ Form::open(array('action' => 'PostsController@store', 'role' => 'form')) }}
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
                        <img src="/img/user-deafault.jpg" alt="SkyLanguage" class="img-circle post-pic">
                        <br>
                        <br>
                        <h4 class="text-center">Rissa Waters</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <button type="button" class="btn btn-group-xs posts-btn">Like</button>
                    <button type="button" class="btn btn-group-xs posts-btn">Comment</button>
                    <button type="button" class="btn btn-group-xs posts-btn">TRANSLATE</button>
                </div>
            </div>

            <div class="row">
                <div class="posts col-md-12">
                    <div class="pull-left">
                        <img src="/img/user-deafault.jpg" alt="SkyLanguage" class="img-circle post-pic">
                        <br>
                        <br>
                        <h4 class="text-center">Russa Ocean</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <button type="button" class="btn btn-group-xs posts-btn">Like</button>
                    <button type="button" class="btn btn-group-xs posts-btn">Comment</button>
                    <button type="button" class="btn btn-group-xs posts-btn">TRANSLATE</button>
                </div>
            </div>

            <div class="row">
                <div class="posts col-md-12">
                    <div class="pull-left">
                        <img src="/img/user-deafault.jpg" alt="SkyLanguage" class="img-circle post-pic">
                        <br>
                        <br>
                        <h4 class="text-center">Jacob Ernst</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <button type="button" class="btn btn-group-xs posts-btn">Like</button>
                    <button type="button" class="btn btn-group-xs posts-btn">Comment</button>
                    <button type="button" class="btn btn-group-xs posts-btn">TRANSLATE</button>
                </div>
            </div>

            <div class="row">
                <div class="posts col-md-12">
                    <div class="pull-left">
                        <img src="/img/user-deafault.jpg" alt="SkyLanguage" class="img-circle post-pic">
                        <br>
                        <br>
                        <h4 class="text-center">Jillian Donovan</h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <button type="button" class="btn btn-group-xs posts-btn">Like</button>
                    <button type="button" class="btn btn-group-xs posts-btn">Comment</button>
                    <button type="button" class="btn btn-group-xs posts-btn">TRANSLATE</button>
                </div>
            </div>

        </div><!-- /.col-lg-8 -->
    </div><!-- /.row -->
</div>


@stop

    



