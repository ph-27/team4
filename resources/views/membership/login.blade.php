@extends('layouts.master-login')
@section('content')
	<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>PTY</b> SHOES</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @foreach($errors->all() as $err)
           <div class="alert alert-success">
               {{$err}}
           </div>
        @endforeach
        @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        <p class="login-box-msg" style="color: red; font-size: 35px;">Sign in</p>
        <form action="{{action('AdminController@postlogin')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                        <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}"/>
        </form>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
            Google+</a>
        </div>
        <!-- /.social-auth-links -->
        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection