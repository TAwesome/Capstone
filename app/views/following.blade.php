@extends('layouts.master')
@section('header')
    <link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />
@stop
@section('content')
    <!-- Need to add follow/unfollow button 
    that dynamically loads based on the user's relationship to other users -->
    
    @forelse($data as $person)
        <div class='container top'>
            <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
            <a href="/unfollow/{{{$person->id}}}" class="btn btn-danger follow {{(Auth::user()->follow->contains($person->id)) ? '' : 'hide';}}">unfollow</a>
            <a href="/follow/{{{$person->id}}}" class="btn btn-info follow {{(Auth::user()->follow->contains($person->id)) ? 'hide' : '';}}">follow</a>
        </div>
    @empty
        <div class="container top">
            <h1>No Followers</h1>
        </div>
    @endforelse
<!--     <div class='container'>
        <div>
            <input id="tags"/>
            
        </div>
    </div> -->
    {{ $data->links() }}
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

