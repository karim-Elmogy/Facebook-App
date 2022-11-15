<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{

    public function store(CommentStoreRequest $request,Post $post)
    {
        Comment::create($request->merge([
            "user_id"=> auth()->id(),
            "post_id"=>$post->id
            ])->all());

        return back();
    }
    public function destroy(Comment $commentId)
    {
        $commentId->delete();

        return back();
    }
}
