@extends('base')

@section('title', 'Blog')

@section('content')
    <h1>Mon Blog</h1>

    @foreach ($posts as $post)
        <div class="card mt-3 mb-3">
            <h2 class="card-header">
                {{ $post->title }}
            </h2>
            <div class="card-body">
                <h3 class="card-title">{{ $post->slug }}</h3>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                    class="btn btn-primary">More article</a>
            </div>
        </div>
    @endforeach

    <p> {{ $posts->links() }} </p>

@endsection

