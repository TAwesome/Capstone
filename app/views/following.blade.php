@extends('layouts.master')

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
        </script>

@stop
