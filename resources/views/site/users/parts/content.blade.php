<div class="col-lg-6">
    <div class="central-meta" style="width:700px;">
        <div class="frnds" style="">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Friends</a> <span>{{$friends->count()}}</span></li>
                <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friends Requests</a> <span>{{$friendsRequest->count()}}</span></li>
                <li class="nav-item"><a class="" href="#send-req" data-toggle="tab">Send Requests</a> <span>{{$sendRequests->count()}}</span></li>
                <li class="nav-item"><a class="" href="#all-users" data-toggle="tab">All Users</a> <span>{{$users->count()}}</span></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active fade show" id="frends">
                    <ul class="nearby-contct">
                        @forelse($friends as $friend)
                        <li>
                            <div class="nearly-pepls">
                                <figure>
                                    <a href="{{route("users.show",$friend->id)}}" title="">
                                        <img src="{{$friend->image}}" alt="">
                                    </a>
                                </figure>
                                <div class="pepl-info">
                                    <h4><a href="{{route("users.show",$friend->id)}}" title="">{{$friend->name}}</a></h4>
                                    <span>{{$friend->email}}</span>
                                    @include('site.users.parts.friend-button', ['user_id' => $friend->id,'position' => true])
                                </div>
                            </div>
                        </li>
                        @empty
                            <li>
                                You Haven't Friends
                            </li>
                        @endforelse
                    </ul>
                    <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                </div>
                <div class="tab-pane fade" id="send-req">
                    <ul class="nearby-contct">
                        @forelse($sendRequests as $friend)
                            <li>
                                <div class="nearly-pepls">
                                    <figure>
                                        <a href="{{route("users.show",$friend->id)}}" title="">
                                            <img src="{{$friend->image}}" alt="">
                                        </a>
                                    </figure>
                                    <div class="pepl-info">
                                        <h4><a href="{{route("users.show",$friend->id)}}" title="">{{$friend->name}}</a></h4>
                                        <span>{{$friend->email}}</span>
                                       @include('site.users.parts.friend-button', ['user_id' => $friend->id,'position' => true])
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>
                                You Haven't Send Request
                            </li>
                        @endforelse
                    </ul>
                    <button class="btn-view btn-load-more"></button>
                </div>
                <div class="tab-pane fade" id="frends-req">
                    <ul class="nearby-contct">
                        @forelse($friendsRequest as $friend)
                            <li>
                                <div class="nearly-pepls">
                                    <figure>
                                        <a href="{{route("users.show",$friend->id)}}" title="">
                                            <img src="{{$friend->image}}" alt="">
                                        </a>
                                    </figure>
                                    <div class="pepl-info">
                                        <h4><a href="{{route("users.show",$friend->id)}}" title="">{{$friend->name}}</a></h4>
                                        <span>{{$friend->email}}</span>
                                        @include('site.users.parts.friend-button', ['user_id' => $friend->id,'position' => true])
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>
                                You Haven't Friend Request
                            </li>
                        @endforelse
                    </ul>
                    <button class="btn-view btn-load-more"></button>
                </div>
                <div class="tab-pane fade" id="all-users">
                    <ul class="nearby-contct">
                        @forelse($users as $user)
                            <li>
                                <div class="nearly-pepls" >
                                    <figure>
                                        <a href="{{route("users.show",$user->id)}}" title="">
                                            <img src="{{$user->image}}" alt="">
                                        </a>
                                    </figure>
                                    <div class="pepl-info">
                                        <h4><a href="{{route("users.show",$user->id)}}" title="">{{$user->name}}</a></h4>
                                        <span>{{$user->email}}</span>
                                        @include('site.users.parts.friend-button', ['user_id' => $user->id,'position' => true])
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>
                                Not Found Users
                            </li>
                        @endforelse
                    </ul>
                    <button class="btn-view btn-load-more"></button>
                </div>
            </div>
        </div>
    </div>
</div>
