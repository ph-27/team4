@extends('layouts.master-login')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>PTY</b> SHOES</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <p class="login-box-msg" style="color: red; font-size: 35px;">Đăng nhập</p>
            <form action="{{action('HomeController@postLogin')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Nhập Email"
                           value="{{old('email')}}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert" style="color: red; font-size: small">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert" style="color: red; font-size: small">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}"/>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>

    <script>
        $("div.alert-success").delay(4000).slideUp();
    </script>

@endsection

