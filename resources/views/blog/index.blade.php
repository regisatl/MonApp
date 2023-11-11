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
                <h3 class="card-title text-secondary">{{ $post->slug }}</h3>
                <p class="small">

                    @if ($post->category)
                        <strong class="text-secondary"> Catégorie :</strong> <strong class="text-primary">
                            {{ $post->category?->name }}</strong>
                    @endif

                </p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-primary">View
                    More</a>
                <a href="{{ route('blog.edit', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-primary">Update this article</a>
            </div>
            @if (!$post->tags->isEmpty())
                <div class="card-footer">
                    <strong class="text-secondary">Tags :</strong>
                    @foreach ($post->tags as $tag)
                        <small class="badge bg-secondary pb-2"> {{ $tag->name }} </small>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach

    <p> {{ $posts->links() }} </p>
@endsection
