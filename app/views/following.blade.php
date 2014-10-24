@extends('layouts.master')

@section('content')
    <!-- Need to add follow/unfollow button 
    that dynamically loads based on the user's relationship to other users -->
    @foreach($data as $person)
        <h1>{{$person}}</h1>
    @endforeach
@stop
