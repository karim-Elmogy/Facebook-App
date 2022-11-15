<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::with('user')->latest()->get();
        return view('site.index',compact('posts'));

    }

    public function store(PostStoreRequest $request)
    {
        Post::create($request->merge(["user_id"=>auth()->id()])->all());
        return back();
    }

    public function show(Post $post)
    {
        return view('site.posts.show',compact('post'));
    }

    public function edit(Post $post)
    {
        return view('site.posts.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request,Post $post)
    {
        $post->update($request->all());
        return back();
    }

    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->img);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
