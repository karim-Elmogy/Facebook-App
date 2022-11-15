<div class="central-meta new-pst">
    <div class="new-postbox">
        <figure>
            <a href="{{route('users.show', auth()->id())}}">
            <img  src="{{auth()->user()->image}}" alt="">
            </a>
        </figure>
        <div class="newpst-input">
            <form action="{{route("posts.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea name="body" rows="2" placeholder="what do you think?"></textarea>
                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <input id="imgInp" name="img" type="file">
                            </label>
                        </li>
                        <li>
                            <button type="submit">Post</button>
                        </li>
                    </ul>
                </div>
            </form>
            <img id="postImage" src="#" style="width:120px; height:100px; margin-top:15px;display: none">
        </div>
    </div>
</div><!-- add post new box -->
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#postImage').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
            $('#postImage').css('display', 'block')
        });
    </script>
@endsection
