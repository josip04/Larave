@extends('layouts.app')


@section('content')

<div class="container mt-5">
   

    <form enctype="multipart/form-data" method="POST" action="{{ route('post.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title"  required>
        </div>
        <div class="form-group">
        <label for="body">Description</label>
        <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
        </div>

        <div class="form-group">
        <label for="image">Upload image</label>
        <input type="file" class="form-control-file" id="image" name="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
</div>


@endsection