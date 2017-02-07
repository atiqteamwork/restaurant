@extends('layouts.main')

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
                <div class="checkout-form"> 
                	@if (session('status'))
                    	<div class="alert alert-success"> {{ session('status') }} </div>
                    @endif
                    <form class="form-horizontal validate" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email">E-mail Address <span>*</span></label>
                            
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" 
                                name="email" value="{{ $email or old('email') }}" 
                                required autofocus data-fv-notempty-message="Email is required">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                         </div>
                         
                         
                         
                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         	<label for="password">Password <span>*</span></label>
                         	<input id="password" type="password" class="form-control" 
                                name="password" 
                                required data-fv-notempty-message="Password is required"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                data-fv-regexp-message="Password must be at least 1 capital, 1 lowercase, 1 number and 8+ characters long">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                         </div>
                         
                         
                         
                         
                         <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      						<label for="password-confirm">Confirm Password <span>*</span></label>
                         	<input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation"
                                required data-fv-notempty-message="Password Confirmation is required"
                                data-fv-identical="true" data-fv-identical-field="password"
                                data-fv-identical-message="The password and it's confirmation are not the same">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                         </div>
                         
                         
                        <button type="submit" class="btn btn-submit"> Reset Password </button>
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





<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal validate" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" 
                                name="email" value="{{ $email or old('email') }}" 
                                required autofocus data-fv-notempty-message="Email is required">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" 
                                name="password" 
                                required data-fv-notempty-message="Password is required"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                data-fv-regexp-message="Password must be at least 1 capital, 1 lowercase, 1 number and 8+ characters long">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation"
                                required data-fv-notempty-message="Password Confirmation is required"
                                data-fv-identical="true" data-fv-identical-field="password"
                                data-fv-identical-message="The password and it's confirmation are not the same">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

@endsection
