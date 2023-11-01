<form action="" method="POST">
    @csrf
    @method($post->id ? 'PATCH' : 'POST')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="title" placeholder="title"
            value="{{ old('title', $post->title) }}">
        <label for="title">Title</label>
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="slug" placeholder="slug"
            value="{{ old('slug', $post->slug) }}">
        <label for="slug">Slug</label>
        @error('slug')
            {{ $message }}
        @enderror
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" name="content" placeholder="Content">{{ old('content', $post->content) }}</textarea>
        <label for="content">Content</label>
        @error('content')
            {{ $message }}
        @enderror
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="category" name="category_id">
            @foreach ($categories as $category)
                <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="category">Select a category</label>
        @error('category_id')
            {{ $message }}
        @enderror
    </div>

    @php
        $tagIds = $post->tags->pluck('id');
    @endphp

    <div class="form-floating mb-3">
        <select class="form-select" id="tag" name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option @selected($tagIds->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <label for="tag">Select one or more tags</label>
        @error('tags')
            {{ $message }}
        @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100 font-bold py-3 shadow">

        @if ($post->id)
            Update
        @else
            Create
        @endif

    </button>
</form>

<style>
    button {
        font-family: Anton;
    }
</style>
