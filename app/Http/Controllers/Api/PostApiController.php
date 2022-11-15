<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index($user)
    {
        return PostResource::collection(Post::whereUserId($user)->get());
    }
}
