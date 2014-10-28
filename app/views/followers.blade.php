@extends('layouts.master')

@section('content')
    <!-- Need to add follow/unfollow button 
    that dynamically loads based on the user's relationship to other users -->
    @forelse($data as $person)
        <div class='container'>
            <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
            @if(Auth::user()->follow->contains($person->id))
                <a href="/unfollow/{{{$person->id}}}" class="btn btn-danger follow">Unfollow</a>
                <a href="/follow/{{{$person->id}}}" class="btn btn-info follow hide">Follow</a>
            @else
                <a href="/unfollow/{{{$person->id}}}" class="btn btn-danger follow hide">Unfollow</a>
                <a href="/follow/{{{$person->id}}}" class="btn btn-info follow">Follow</a>
            @endif
        </div>
    @empty
        <h1>No Followers</h1>
    @endforelse
    
    <div class='container'>
        <h1>Post 1</h1>
        @if(Auth::user()->likes->contains(1))
            <a href="/unlike/1" class="btn btn-danger follow">unlike</a>
            <a href="/like/1" class="btn btn-info follow hide">like</a>
        @else
            <a href="/unlike/1" class="btn btn-danger follow hide">unlike</a>
            <a href="/like/1" class="btn btn-info follow">like</a>
        @endif
    </div>
    
    <div class='container'>
        <h1>Post 2</h1>
        @if(Auth::user()->likes->contains(2))
            <a href="/unlike/2" class="btn btn-danger follow">unlike</a>
            <a href="/like/2" class="btn btn-info follow hide">like</a>
        @else
            <a href="/unlike/2" class="btn btn-danger follow hide">unlike</a>
            <a href="/like/2" class="btn btn-info follow">like</a>
        @endif
    </div>
    
    {{ $data->links() }}
    <script src="/js/following.js"></script>
@stop
