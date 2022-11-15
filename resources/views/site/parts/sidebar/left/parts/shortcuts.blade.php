<div class="widget">
    <h4 class="widget-title">Shortcuts</h4>
    <ul class="naves">
        <li>
            <a href="{{route('users.show', auth()->id())}}">Your Profile</a>
        </li>
        <li>
            <a href="{{route("posts.index")}}">Posts</a>
        </li>
        <li>
            <a href="{{route("users.index")}}">Users</a>
        </li>

        <li>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" title="">Logout</button>
            </form>
        </li>
    </ul>
</div><!-- Shortcuts -->
