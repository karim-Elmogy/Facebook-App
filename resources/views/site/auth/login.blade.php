@extends('site.auth.layout.login-layout')

@section('title', 'Login')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="post" action="{{route('login')}}" class="login100-form validate-form">
                    @csrf
                    <a href="">
                    <i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i>
                    </a>
                    <span class="login100-form-title p-b-49">
						Login
					</span>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa fa-times">&times;</i>
                            </button>
                            <span>
                        {{$errors->first()}}
                    </span>
                        </div>
                    @endif
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
                        <span class="label-input100">Email</span>
                        <input value="{{old('email')}}" class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="container-login100-form-btn p-t-50">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button  class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                    <div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Register
						</span>

                        <a class="txt2 btn btn-primary" style="color:white"  href="{{route('registerForm')}}">
                            Register
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


