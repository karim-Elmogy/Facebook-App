<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withoutMe()->get();

        $friends = User::friends()->get();

        $sendRequests = User::sendRequests()->get();

        $friendsRequest = User::friendsRequest()->get();

        return view('site.users.index',compact("users", "friends", "sendRequests", "friendsRequest"));
    }
    public function friends(User $user)
    {
        $users = User::withoutMe()->get();

        $friends = User::friends()->get();

        $sendRequests = User::sendRequests()->get();

        $friendsRequest = User::friendsRequest()->get();

        return view('site.users.followers',compact("user", "users", "friends", "sendRequests", "friendsRequest"));
    }

    public function edit(User $user)
    {
        return view('site.users.edit', compact('user'));
    }

    public function show(User $user)
    {
        $posts=$user->posts()->latest()->get();
        return view("site.users.show",compact("posts", "user"));
    }

    public function update(UserUpdateRequest $request,User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.show', $user->id);
    }
}
