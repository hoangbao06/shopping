@extends('layouts2.app')
@section('content')	
<div class="wrapper">
    <div class="page-header" style="background-image: url('{{asset('assets2')}}/img/sections/bruno-abatti.jpg');">
        <div class="filter"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <div class="card card-register">
                        <h3 class="card-title">Welcome</h3>
                        <form class="register-form" method="post" action="{{ route('login_Process_User') }}">
                            @csrf
                            <label>Email</label>
                            <input type="email" name="email" class="form-control no-border" placeholder="Email">
                            @if (Session::exists('error')) 
                            <br>
                            <div class="alert alert-danger">
                            {{ Session::get('error.email') }}
                            </div>
                            @endif
                            <label>Password</label>
                            <input type="password" name="password" class="form-control no-border" placeholder="Password">
                            @if (Session::exists('error'))
                            <br>
                            <div class="alert alert-danger">
                                {{ Session::get('error.message') }}
                            </div>
                            @endif
                            <button class="btn btn-danger btn-block btn-round">Đăng Nhập</button> <br>
                            <button class="btn btn-danger btn-block btn-round"><a href="{{ route('DangKi') }}">Đăng Kí Tài Khoản ? </a></button>
                        </form>
                        <div class="forgot">
                            <a href="#paper-kit" class="btn btn-link btn-danger">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="demo-footer text-center">
                <h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</h6>
            </div>
        </div>
    </div>
</div>
@endsection