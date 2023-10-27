@extends('base')

@section('title', 'Accueil du blog')

@section('content')
    <h1>Mon Blog</h1>

    @foreach ($posts as $post)
        <div class="card mt-3 mb-3">
            <div class="card-header font-bold">
                {{ $post->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->slug }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                    class="btn btn-primary font-bold">More article</a>
            </div>
        </div>
    @endforeach

    <p> {{ $posts->links() }} </p>

@endsection

<style>
    h5,
    a {
        font-weight: 700;
    }
</style>
