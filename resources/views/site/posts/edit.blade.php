@extends('layout.site')
@section('content')
    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row merged20" id="page-contents">
                            @include('site.parts.sidebar.left.index')
                            <div class="col-lg-6">
                                <div class="central-meta new-pst">
                                    <div class="new-postbox">
                                        <figure>
                                            <a href="#">
                                                <img  src="{{$post->user->image}}" alt="">
                                            </a>
                                        </figure>
                                        <div class="newpst-input">
                                            <form action="{{route("posts.update",$post->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method("PATCH")
                                                <input type="hidden" name="id" value="{{$post->id}}">
                                                <textarea name="body" rows="2" placeholder="what do you think?">{{$post->body}}</textarea>
                                                <div class="attachments">
                                                    <ul>
                                                        <li>
                                                            <i class="fa fa-image"></i>
                                                            <label class="fileContainer">
                                                                <input id="imgEditInp" name="img" type="file">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <button type="submit">edit</button>
                                                        </li>
                                                    </ul>
                                                </div>
{{--                                                <img src="{{$post->image}}" style="width:150px; height:150px" >--}}
                                            </form>
                                            <img id="postEditImage" src="{{$post->image}}" style="{{$post->image?'':'display:none'}} width:120px; height:100px; margin-top:15px">
                                        </div>
                                    </div>
                                </div><!-- add post new box -->
                                <div class="central-meta item" style="display: inline-block;">
                                    @include('site.posts.parts.post-card', ['edit' => false])
                                </div>
                            </div><!-- centerl meta -->
                            @include('site.parts.sidebar.right.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#postEditImage').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgEditInp").change(function(){
            readURL(this);
            $('#postEditImage').css('display', 'block')
        });
    </script>
@endsection
