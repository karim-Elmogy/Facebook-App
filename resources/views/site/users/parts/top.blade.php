<section>
    <div class="feature-photo">
        <figure><img style="width: 100%; height: 450px" src="{{asset('assets/profile/cover.jpg')}}" alt=""></figure>
        <div class="add-btn">
            @include('site.users.parts.friend-button', ['user_id' => $user->id,'position' =>false])
            @if($user->id == auth()->id())
                <a href="{{route('users.edit', $user->id)}}">
                    <span class=" ml-2"><i class="fas fa-edit"></i> Edit Profile</span>
                </a>
                @endif
        </div>
{{--        @if($user->id == auth()->id())--}}
{{--        <form action="" enctype="multipart/form-data" class="edit-phto">--}}
{{--            @csrf--}}
{{--            <i class="fa fa-camera-retro"></i>--}}
{{--            <label class="fileContainer">--}}
{{--                Edit Cover Photo--}}
{{--                <input name="cover" type="file">--}}
{{--            </label>--}}
{{--            <button type="submit">change</button>--}}
{{--        </form>--}}
{{--        @endif--}}
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="{{$user->image}}"
                                 alt=""
                            >
                            @if($user->id == auth()->id())
                                <form method="post" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data" class="edit-phto">
                                    @method('PATCH')
                                    @csrf
                                    <i class="fa fa-camera-retro"></i>
                                    <label class="fileContainer">
                                        Edit Display Photo
                                        <input name="img" type="file">
                                    </label>
                                    <button type="submit">change</button>
                                </form>
                            @endif
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5>{{$user->name}}</h5>
                                <span>{{$user->email}}</span>
                            </li>
                            <li>
                                <a class="" href="{{route('users.show', $user->id)}}" title="" data-ripple="">time line</a>
                                @if($user->id == auth()->id())
                                <a class="" href="{{route('users.friends', $user->id)}}" title="" data-ripple="">Friends</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- top area -->
