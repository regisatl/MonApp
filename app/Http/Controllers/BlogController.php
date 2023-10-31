<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{

      //
      public function index(): View
      {

            $post = Post::find(2);

           $tag = $post->tags;

            return view('blog.index', [
                  'posts' => Post::paginate(1)
            ]);
      }

      public function show(string $slug, Post $post): RedirectResponse | View
      {

            if ($post->slug !== $slug) {
                  return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
            }

            return view('blog.show', [
                  'post' => $post
            ]);
      }

      public function create(): View
      {
            $post = new Post();
            return view('blog.create', [
                  'post' => $post,
            ]);
      }

      public function store(CreatePostRequest $request)
      {

            $post = Post::create($request->validated());

            return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'Your blog has been saved');
      }

      public function edit(Post $post)
      {
            return view('blog.edit', [
                  'post' => $post
            ]);
      }

      public function update(Post $post, CreatePostRequest $request)
      {
            $post->update($request->validated());
            return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'Your blog has been updated');
      }
}
