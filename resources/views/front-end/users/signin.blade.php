@extends('front-end.layouts.master')
@section('title','Đăng Nhập Hệ Thống')
@section('styles')
    <link rel="stylesheet" href="{{asset('store_frontend/css/user.css')}}">
@endsection
@section('contents')
    @include('front-end.layouts.header')
    <div class="layout-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xs-12 wrapbox-heading-page">
                    <div class="header-page clearfix">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 wrapbox-content-page ">
                    <div id="customer-login">
                        <div id="login" class="userbox">
                            <div class="accounttype">
                                <h2 class="title"></h2>
                            </div>
                            <div id="customer_login">
                                <form method="POST" action="{{ route('login.signin') }}" class="f">
                                    @csrf
                                    <ul>
                                        <li>
                                            <input type="email" name="email" required class="tb validate[required]" id="email" placeholder="Vui lòng nhập Email">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            <input name="password" required type="password" class="tb validate[required]" id="password" placeholder="Mật khẩu" value="">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Ghi nhớ mật khẩu</label>
                                        </li>
                                        <li class="btns">
                                            <input name="submit" type="submit" id="btnSubmit" class="htmlBtn first" value="Đăng nhập">
                                        </li>
                                    </ul>
                                </form>
                                <div class="clearfix action_account_custommer">
                                    <div class="req_pass">
                                        <a href="/user/getpassword" style="display: block">Quên mật khẩu?</a>
                                        <a href="{{ route('register-user') }}"  style="display: block">Đăng ký</a>
                                    </div>
                                </div>
                                <div class="divider">
                                    <span>Hoặc</span>
                                </div>
                            </div>
                            <div class="login-social">
                                <a href="/user/fbsignin"><i class="fab fa-facebook-f"></i> <span>Đăng nhập bằng tài khoản facebook</span></a>
                            </div>
                            <div class="login-social" style="background: #df4a32;margin-top: 10px">
                                <a href="/user/ggsignin"><i class="fab fa-google-plus-g"></i>
                                    <span>Đăng nhập bằng tài khoản google</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front-end.layouts.footer')
@endsection
<style>
    #customer_login ul li {
        margin-bottom: 30px;
    }
    #customer_login ul li.btns{
        margin-bottom: 0;
    }
    #customer_login ul li.btns input{
        width: 100%;
    }
    .action_account_custommer{
        text-align: center;
    }
    .action_account_custommer a{
        text-decoration: underline;
        color: #626262;
    }
    .divider{
        position: relative;
        text-align: center;
        margin: 10px 0 30px 0;
        min-height: 20px;
    }
    .divider:after{
        content: '';
        height: 9px;
        border-bottom: 1px solid #a4a4a4;
        position: absolute;
        top: 50%;
        right: 0;
        left: 0;
    }
    .divider span{
        background: #fff;
        z-index: 999;
        position: absolute;
        top: 50%;
        padding: 0 10px;
        left: 46%;
    }
    .login-social{
        background: #385898;
        padding: 15px 0;
        text-align: center;
    }
    .login-social *{
        font-size: 15px;
        color: #fff;
    }
    .login-social i{
        padding: 0 10px;
    }
</style>
