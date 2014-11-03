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

<div class="text-center">

    {{ $users->appends(array('search' => Input::get('search')))->links()}}

</div>

@stop

@section('bottom-script')
    <script src="/js/following.js"></script>
@stop
