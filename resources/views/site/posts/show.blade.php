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
                            <div class="loadMore">
                                <div class="central-meta item" style="display: inline-block;">
                                    @include('site.posts.parts.post-card', ['edit' => true])
                                </div>
                            </div>
                            </div>
                            {{--                            @include('site.parts.sidebar.right.index')--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
