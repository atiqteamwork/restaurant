@extends('layouts.default')

@section('content')

<div class="outer_body no-padding">
    <!--start check_out_box-->
    <div class="check_out_box M-bottom-30 parallax-window" data-parallax="scroll" data-image-src="../assets/images/check-out-img.png">
        <div class="wrapper-box">
            <h2>
                Order Food Delivery From your <span>Favorite</span> Restaurants
            </h2>
            <p>delivering to your door</p>
        </div>
    </div>
    <div class="container">
        <div class="crumbs">
            <h2 class="pull-left">Login Form</h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-12 col-md-offset-4">
               <!--login Form-->
                <div class="checkout-form">
                    <form class="form-horizontal validate" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">email <span>*</span></label>                            
                            <input id="email" type="email" class="form-control"
                                name="username" value="{{ old('username') }}"
                                required data-fv-notempty-message="Username is required">
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span>*</span></label>

                            <input id="password" type="password" class="form-control"
                                name="password" required data-fv-notempty-message="Password is required">
                        </div>
                        <!--<div class="checkbox">
                            <input type="checkbox" id="c1" name="cc" checked />
                            <label for="c1"><span></span>Remeber Me</label>
                        </div>-->
                        <button type="submit" class="btn btn-submit"> Login Now</button>
                        <!--<a href="#" class="btn btn-submit">LOGIN NOW</a>-->
                    </form>
                </div>

                <hr class="check-border">
                <div class="row">
                    <div class="col-md-6">
                        <!--<div class="info-checkout">
                            <a href="#"><i class="fa fa-user"></i> register an account?</a>
                        </div>-->
                    </div>
                    <div class="col-md-6">
                        <div class="info-checkout">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}"> <i class="fa fa-unlock"></i> lost your password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body"> @include('errors.errors')
                    <form class="form-horizontal validate" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control"
                                name="username" value="{{ old('username') }}"
                                required data-fv-notempty-message="Username is required">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"
                                name="password"
                                required data-fv-notempty-message="Password is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <!--<label>
                                        <input type="checkbox" name="remember">
                                        Remember Me </label>--
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Login </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}"> Forgot Your Password? </a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
