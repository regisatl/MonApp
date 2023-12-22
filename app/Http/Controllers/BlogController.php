<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BlogController extends Controller
{
      //
      public function index(): View
      {
            return view('blog.index', [
                  'posts' => Post::with('tags', 'category')->paginate(10)
            ]);
      }

      public function show(string $slug, Post $post): RedirectResponse|View
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
                  'categories' => Category::select('id', 'name')->get(),
                  'tags' => Tag::select('id', 'name')->get()
            ]);
      }

      public function store(CreatePostRequest $request)
      {
            $post = Post::create($this->extractData(new Post(), $request));

            return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'Your blog has been saved');
      }

      public function edit(Post $post)
      {
            return view('blog.edit', [
                  'post' => $post,
                  'categories' => Category::select('id', 'name')->get(),
                  'tags' => Tag::select('id', 'name')->get()

            ]);
      }

      public function update(Post $post, CreatePostRequest $request)
      {
            $post->update($this->extractData($post, $request));
            $post->tags()->sync($request->validated('tags'));
            return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'Your blog has been updated');
      }

      private function extractData(Post $post, CreatePostRequest $request)
      {
            $data = $request->validated();
            /** @var UploadedFile | null $image */
            $image = $request->validated('image');
            if ($image === null || $image->getError()) {
                  return $data;
            }
            if ($post->image) {
                  Storage::disk('public')->delete($post->image);
            }
            if ($image !== null && !$image->getError()) {

                  $data['image'] = $image->store('blog', 'public');
            }
      }


}
