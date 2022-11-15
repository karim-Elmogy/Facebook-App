<div class="widget stick-widget" style="">
    <h4 class="widget-title">Followers</h4>
    <ul class="followers ps-container ps-theme-default ps-active-y"
        data-ps-id="ab6b8c38-53cd-115e-2fc0-1132cb120641">
        @forelse($user->followers??auth()->user()->followers as $follower)
        <li>
            <figure>
                <img
                    src="{{str_contains($follower->avatar, 'user/avatar')?'/storage/'.$follower->avatar:$follower->avatar}}"
                    alt=""
                >
            </figure>
            <div class="friend-meta">
                <h4>
                    <a href="{{route('users.show', $follower->id)}}" title="">
                        {{$follower->name}}
                    </a>
                </h4>
                @unless(auth()->id() == $follower->id)
                <a href="{{route('follows.store', $follower->id)}}" title="" class="underline">
                    @if(\App\Follow::whereFollowerId(auth()->id())->whereUserId($follower->id)->first())
                        unfollow
                    @else
                        follow
                    @endif
                </a>
                    @endunless
            </div>
        </li>
            @empty
            <li>
                Not Found Followers
            </li>
        @endforelse
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;">
            </div>
        </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 260px; right: 0px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 187px;">
                </div>
            </div>
    </ul>
    <h4 class="widget-title">Who are you following</h4>
    <ul class="followers ps-container ps-theme-default ps-active-y"
        data-ps-id="ab6b8c38-53cd-115e-2fc0-1132cb120641">
        @forelse($user->followering??auth()->user()->following as $follower)
            <li>
                <figure>
                    <img
                        src="{{str_contains($follower->avatar, 'user/avatar')?'/storage/'.$follower->avatar:$follower->avatar}}"
                        alt=""
                    >
                </figure>
                <div class="friend-meta">
                    <h4>
                        <a href="{{route('users.show', $follower->id)}}" title="">
                            {{$follower->name}}
                        </a>
                    </h4>
                    <a href="{{route('follows.store', $follower->id)}}" title="" class="underline">
                        @if(\App\Follow::whereFollowerId(auth()->id())->whereUserId($follower->id)->first())
                            unfollow
                        @else
                            follow
                        @endif
                    </a>
                </div>
            </li>
        @empty
            <li>
                Not Found Following
            </li>
        @endforelse
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 260px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 187px;"></div></div></ul>
</div><!-- who's following -->
