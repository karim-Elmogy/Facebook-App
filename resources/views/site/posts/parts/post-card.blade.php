<div class="user-post">
    <div class="friend-info" style="position: relative;">
        <figure>
            <img  src="{{$post->user->image}}" alt="">
        </figure>
        <div class="friend-name">
            <ins >
                <a href="{{route('users.show', $post->user->id)}}" title="">{{$post->user->name}}</a>

                @include('site.users.parts.friend-button', ['user_id' => $post->user->id,'position' => true])
                @if($post->user->id == auth()->id())
                    <div style="position: absolute; top:0 ;right:0" >
                        @if($edit)
                        <a href="{{route("posts.edit",$post->id)}}" class="btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        @endif
                        <form action="{{route("posts.destroy",$post->id)}}" method="post" style="display: inline-block;">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                @endif
            </ins>
            <span>published: {{$post->created_at->diffForHumans()}}</span>
        </div>

        <a href="{{route("posts.show",$post->id)}}">
            <div class="post-meta">
                <div class="description">

                    <p>
                        {{$post->body}}
                    </p>
                </div>
                <img src="{{$post->image}}" alt="">
                <div class="we-video-info">
                    <ul>
                        <li>
                                <span class="comment" data-toggle="tooltip" title="" data-original-title="Comments">
                                    <i class="fa fa-comments-o"></i>
                                    <ins>{{$post->comments->count()}}</ins>
                                </span>
                        </li>
                        <li>
                            <a href="">
                                <span class="like" data-toggle="tooltip" title="" data-original-title="like">
                                   <i class="fas fa-heart"></i>
                                    <ins>2</ins>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                     <span class="dislike" data-toggle="tooltip" title="" data-original-title="dislike">
                                        <i class="fas fa-heart-broken"></i>
                                       <ins>1</ins>
                                     </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </a>

    </div>
    <div class="coment-area">
        <ul class="we-comet">
            @foreach ($post->comments()->get() as $comment)
                @if($comment)
                    <li>
                        <div class="comet-avatar">
                            <img src="{{$comment->user->image}}" alt="">
                        </div>
                        <div class="we-comment">
                            <div class="coment-head" style="position:relative">
                                <h5><a href="{{route('users.show', $comment->user->id)}}" title="">
                                        {{$comment->user->name}}
                                    </a>
                                </h5>
                                <span>{{$comment->created_at->diffForHumans()}}</span>

                                @if($comment->user->id == auth()->id()||$post->user->id == auth()->id())
                                    <form action="{{route("comments.destroy",$comment->id)}}" method="post" style="position: absolute;top: 0;right: 0;">
                                       @csrf
                                      @method("DELETE")
                                     <button type="submit" class="btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                   </form>
                                @endif
                            </div>
                            <p>
                                {{$comment->body}}
                            </p>
                        </div>
                    </li>
                @endif
            @endforeach
            <li class="post-comment">
                <div class="comet-avatar">
                    <img src="{{auth()->user()->image}}" alt="userImage">
                </div>
                <div class="post-comt-box">
                    <form action="{{route("posts.comments.store",$post->id)}}" method="post">
                        @csrf

                        <textarea name="body" placeholder="Write your comment" required ></textarea>
                        <div class="add-smiles">
                            <span class="em em-expressionless" title="add icon"></span>
                        </div>
                        <button class="pb-3" type="submit"><span style="color: #2fa7cd">send</span></button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
