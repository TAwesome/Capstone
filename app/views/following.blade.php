@extends('layouts.master')
@section('header')
    <link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />

@stop
@section('content')
    <!-- Need to add follow/unfollow button that dynamically loads based on the user's relationship to other users -->
    <div class="following top row">
        @forelse($data as $person)
            <div class="container col-sm-12 col-md-6 text-center">
                <img src="/img/Logo-user-default.png" alt="{{{ $person->first_name }}} {{{ $person->last_name }}}" class="image-responsive post-img">
                <h1><a href="/users/{{{ $person->id}}}">{{ $person->first_name }} {{ $person->last_name }}</a></h1>
                <a href="/unfollow/{{{$person->id}}}" class="btn btn-danger follow {{(Auth::user()->follow->contains($person->id)) ? '' : 'hide';}}">unfollow</a>
                <a href="/follow/{{{$person->id}}}" class="btn btn-info follow {{(Auth::user()->follow->contains($person->id)) ? 'hide' : '';}}">follow</a>
            </div>
        @empty
            <div class="container">
                <h1>Not following anyone</h1>
            </div>
        @endforelse
    </div>
    <div class="text-center">{{ $data->links() }}</div>
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

