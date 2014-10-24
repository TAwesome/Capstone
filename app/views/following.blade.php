@extends('layouts.master')

@section('content')
    @foreach($data as $person)
        <h1>{{$person}}</h1>
    @endforeach
@stop
