<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    public function index($post)
    {
      return CommentResource::collection(Comment::wherePostId($post)->get());
    }
}
