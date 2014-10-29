@extends('layouts.master')

@section('header')

<title>Index</title>

@stop

@section('content')

@forelse($users as $person)
    <div class='container'>
        <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
        <a href="/unfollow/{{{$person->id}}}" class="btn btn-danger follow {{(Auth::user()->follow->contains($person->id)) ? '' : 'hide';}}">unfollow</a>
        <a href="/follow/{{{$person->id}}}" class="btn btn-info follow {{(Auth::user()->follow->contains($person->id)) ? 'hide' : '';}}">follow</a>
    </div>
@empty
    <h1>Nothing here</h1>
@endforelse

{{ $users->appends(array('search' => Input::get('search')))->links()}}

<form class="navbar-form navbar-left" role="search" method='GET' action="{{ action('UsersController@index')}}">
    <input type="text" id='search' name='search'class="form-control" placeholder="Search">
    <div class="form-group">
        <span>
            <button class='btn btn-default'><i class='fa fa-search'></i></button>
        </span>
    </div>
</form>

@stop

@section('bottom-script')
    <script src="/js/following.js"></script>
@stop
