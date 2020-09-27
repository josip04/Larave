@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <img src="{{ $post->image }}" class="img-fluid" alt="image">
    
    <h2 class="mt-2 mb-2"> {{ $post->title }} </h2> 
    <p> Posted by {{ $post->author->name }}</p>

    <small class="form-text text-muted font-italic">{{ $post->created_at }}</small>
    <p> {{ $post->body }} </p>


    <h5>Comments ( {{ $comments->count() }} )</h5>
    @forelse($comments as $comment)

   
    <div class="media-body">
        <div class="well well-lg">
            <i> {{ $comment->user->name }}  </i>
            
            
            <p class="media-comment">
                {{ $comment->comment }} :) 
            </p>
            

            </div>              
    </div>

    @empty
    <div class="container">
        <h5>No comments for this post yet.</h5>
    </div>
    @endforelse

</div>


@endsection