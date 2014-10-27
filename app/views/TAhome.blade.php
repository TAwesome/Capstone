@extends('layouts.master')

@section('header')

<title>Home</title>

@stop

@section('content')

    <div class="container theme-showcase" role="main">

      <div class="row">
        <div class="col-sm-offset-2 col-lg-8">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Search</button>
            </span>
            <input type="text" class="form-control">
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->


          <!-- User Posting ability -->
      <div class="guidebar-home list-group col-sm-3">
        <a href="#" class="list-group-item active">Home</a>
        <a href="#" class="list-group-item">English</a>
        <a href="#" class="list-group-item">French</a>
        <a href="#" class="list-group-item">Spanish</a>
      </div>


      <div class="posts-container-home col-sm-8">
         <div>
            <input type="text" class="form-control" placeholder="Try a new Language!">
        </div>
      </div>

    </div>


@stop

    



