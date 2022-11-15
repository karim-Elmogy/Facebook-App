<?php

use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("users", [UserApiController::class, "index"]);

Route::get("users/{user}/posts", [PostApiController::class, "index"]);

Route::get("posts/{post}/comments", [CommentApiController::class, "index"]);
