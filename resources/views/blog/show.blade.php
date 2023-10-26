@extends('base')

@section('title', $post->title)

@section('content')
    <h1>Mon Blog</h1>

    <div class="card mt-3 mb-3">

        <div class="card-body">
            <h5 class="card-title font-semibold">{{ $post->slug }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
        
    </div>

@endsection
