@unless($user_id== auth()->id())
    @php
        //I'm Sender
        $sendRequest = \App\Models\FriendRequest::whereAccept(0)->whereSenderId(auth()->id())->whereUserId($user_id)->first();
        //I'm Reciver (confirm + cancel)
        $friendRequest = \App\Models\FriendRequest::whereAccept(0)->whereUserId(auth()->id())->where('sender_id', $user_id)->first();
        //My friend
        $myFriend = \App\Models\FriendRequest::whereAccept(1)->whereSenderId(auth()->id())->whereUserId($user_id)->orWhere('user_id',auth()->id())->whereAccept(1)->whereSenderId($user_id)->first();

    @endphp
    @if($sendRequest)
        <form action="{{route('friends.destroy', $sendRequest->id)}}" method="post" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" style="{{$position?'position:absolute; top:0px; right:0px':''}}" class="btn-sm btn-danger ml-2" ><i class="fas fa-user-alt-slash"></i> Cancel Request</button>
        </form>
    @elseif($friendRequest)
    <div style="{{$position?'position:absolute; top:0px; right:0px':''}}">
        <form action="{{route('friends.update', $friendRequest->id)}}" method="post" style="display: inline-block;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn-sm btn-primary ml-2"><i class="fas fa-user-check"></i> Confirm</button>
        </form>
        <form action="{{route('friends.destroy', $friendRequest->id)}}" method="post" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-sm btn-danger ml-2"  ><i class="fas fa-user-alt-slash"></i> Cancel</button>
        </form>
    </div>
    @elseif($myFriend)
        <span  class=" ml-2"><i class="fas fa-user-friends"></i></span>
            <form action="{{route('friends.destroy', $myFriend->id)}}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-sm btn-danger ml-2" style="{{$position?'position:absolute; top:0px; right:0px':''}}"><i class="fas fa-user-times"></i> Remove Friend</button>
            </form>
    @else
        <form action="{{route('friends.store')}}" method="post" style="display: inline-block;">
            @csrf
            <input name="user_id" type="hidden" value="{{$user_id}}">
            <button type="submit" style="{{$position?'position:absolute; top:0px; right:0px':''}}" class="btn-sm btn-primary ml-2"><i class="fas fa-user-plus"></i> Add Friend</button>
        </form>
    @endif
@endunless
