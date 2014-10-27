@extends('layouts.master')
@section('header')
    <script src="/js/jquery.tagsinput.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />
@stop
@section('content')
    <!-- Need to add follow/unfollow button 
    that dynamically loads based on the user's relationship to other users -->
    @foreach($data as $person)
    
        <div class='container'>
            <h1>{{$person['name']}}</h1>
            @if(User::find(Auth::id())->follow->contains($person['id']))
                <a href="/unfollow/{{{$person['id']}}}" class="btn btn-default follow">Unfollow</a>
                <a href="/follow/{{{$person['id']}}}" class="btn btn-default follow hide">Follow</a>
            @else
                <a href="/unfollow/{{{$person['id']}}}" class="btn btn-default follow hide">Unfollow</a>
                <a href="/follow/{{{$person['id']}}}" class="btn btn-default follow">Follow</a>
            @endif
        </div>
        
    @endforeach
    <div class='container'>
        <div>
            <input id="tags"/>
        </div>
    </div>
    
        <script type="text/javascript">
            $(".follow").click(function(event) {
                event.preventDefault();
                
                var $followButton = $(this);
                var url = $followButton.attr('href');
                // $followButton.hide();
                // traverser to find follow button
                // $.get();
                $.get(url, function(){
                    $followButton.toggleClass('hide');
                    $followButton.siblings('.follow').toggleClass('hide');
                });
                
            });
            
            $('#tags').tagsInput({
                    "width": "75%",
                    "height": "70px",
                    'defaultText':''
            }); 
        </script>

@stop
