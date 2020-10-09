@extends('layouts.app')


@section('content')

<div class="container">

    <a type="button" class="btn btn-success btn-md mb-2" href="{{ route('post.create') }}">Add Blog</a>

    <div class="row">
        {{-- <div class="card-deck"> --}}

        @forelse($posts as $post)

        <div class="card-deck col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/'.$post->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->body }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-primary mr-1"
                                href="{{ route('post.show',['post' => $post]) }}">View</a>
                            <a type="button" class="btn btn-sm btn-outline-primary mr-1"
                                href="{{ route('post.edit',['post' => $post->id]) }}">Edit</a>

                            <form method="POST" action="{{ route('post.delete', ['post' => $post->id]) }}">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</Button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty

        <div class="container">
            <h2>You dont have any posts yet!</h2>
        </div>

        @endforelse

        {{-- </div> --}}
    </div>

</div>


@endsection
