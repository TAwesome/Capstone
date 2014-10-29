@extends('layouts.master')

@section('content')
    <!-- Need to add follow/unfollow button 
    that dynamically loads based on the user's relationship to other users -->
    @forelse($data as $person)
        <div class='container'>
            <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
            <a href="/unfollow/{{{$person->id}}}" class="btn btn-danger follow {{(Auth::user()->follow->contains($person->id)) ? '' : 'hide';}}">unfollow</a>
            <a href="/follow/{{{$person->id}}}" class="btn btn-info follow hide {{(Auth::user()->follow->contains($person->id)) ? 'hide' : '';}}">follow</a>
        </div>
    @empty
        <h1>No Followers</h1>
    @endforelse
    
    <div class='container'>
        <h1>Post 1</h1>
        <a href="/unlike/1" class="btn btn-info follow {{(Auth::user()->likes->contains(1)) ? '' : 'hide';}}"><i class="fa fa-heart"></i></a>
        <a href="/like/1" class="btn btn-default follow {{(Auth::user()->likes->contains(1)) ? 'hide' : '';}}"><i class="fa fa-heart-o"></i></a>
    </div>
    
    <div class='container'>
        <h1>Post 2</h1>
        <a href="/unlike/2" class="btn btn-info follow {{(Auth::user()->likes->contains(2)) ? '' : 'hide';}}"><i class="fa fa-heart"></i></a>
        <a href="/like/2" class="btn btn-default follow {{(Auth::user()->likes->contains(2)) ? 'hide' : '';}}"><i class="fa fa-heart-o"></i></a>
    </div>
    
    {{ $data->links() }}
@stop
@section('bottom-script')
    <script src="/js/following.js"></script>
@stop
