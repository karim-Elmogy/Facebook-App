<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FriendRequest;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    public function store()
    {
        FriendRequest::create([
            'user_id' => request()->user_id,
            'sender_id' => auth()->id()
        ]);

        return back();
    }

    public function update(FriendRequest $friend)
    {
        $friend->update(['accept' => 1]);

        return back();
    }

    public function destroy(FriendRequest $friend)
    {
        $friend->delete();

        return back();
    }
}
