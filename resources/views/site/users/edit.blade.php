@extends('layout.site')
@section('content')
    @include('site.users.parts.top', ['show' => 'active'])
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
                                        <div class="newpst-input">
                                            <form action="{{route('users.update', $user->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name</label>
                                                        <input style="color: #969696" type="text" name="name" class="form-control" id="name" required placeholder="Enter Your Name" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email</label>
                                                        <input style="color: #969696" type="email" name="email" class="form-control" id="email" required placeholder="Enter Your Email" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        @include('site.parts.sidebar.right.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
