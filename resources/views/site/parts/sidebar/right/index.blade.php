<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="widget">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">&times;</i>
                    </button>
                    <span>{{$errors->first()}}</span>
                </div>
            @endif
        </div>

    </aside>
</div><!-- sidebar -->
