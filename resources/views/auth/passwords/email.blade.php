@extends('layouts.default')
@section('title', 'Reset Password') 

<!-- Main Content --> 
@section('content')
<div class="outer_body no-padding"> 
    <!--start check_out_box-->
    <div class="check_out_box M-bottom-30 parallax-window" data-parallax="scroll" data-image-src="assets_front/images/check-out-img.png">
        <div class="wrapper-box">
            <h2> Order Food Delivery From your <span>Favorite</span> Restaurants </h2>
            <p>delivering to your door</p>
        </div>
    </div>
    <div class="container">
        <div class="crumbs">
            <h2 class="pull-left">Reset Password</h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Home</a></li>
                <li class="active">Reset Password</li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-12 col-md-offset-4"> 
                <!--login Form-->
                <div class="checkout-form"> @if (session('status'))
                    <div class="alert alert-success"> {{ session('status') }} </div>
                    @endif
                    <form class="form-horizontal validate" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-mail Address <span>*</span></label>
                            <input id="email" type="email" class="form-control" 
                                name="email" value="{{ old('email') }}" 
                                required data-fv-notempty-message="Email is required">
                            @if($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>
                        <button type="submit" class="btn btn-submit"> Send Password Reset Link</button>
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
                        <div class="info-checkout"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="outer_body no-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body"> @if (session('status'))
                        <div class="alert alert-success"> {{ session('status') }} </div>
                        @endif
                        <form class="form-horizontal validate" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" 
                                name="email" value="{{ old('email') }}" 
                                required data-fv-notempty-message="Email is required">
                                    @if($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> Send Password Reset Link </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--> 
@endsection 