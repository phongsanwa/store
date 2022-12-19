@extends('front-end.layouts.master')
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
                        <h1>Đăng ký</h1>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 wrapbox-content-page ">
                    <div id="customer-login">
                        <div id="login" class="userbox">
                            <div class="accounttype">
                                <h2 class="title"></h2>
                            </div>
                            <div id="customer_login">
                                <form method="POST" action="{{ route('register.custom') }}" class="f">
                                    @csrf
                                    <ul>
                                        <li>
                                            <input type="text" name="username" required value="{{ old('username') }}" class="tb validate[required]" id="username" placeholder="Nhập tên của bạn">
                                            @if ($errors->has('username'))
                                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            <input type="email" name="email" required value="{{ old('email') }}"  class="tb validate[required]" id="email" placeholder="Email">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            <input name="password" required type="password" class="tb validate[required]" value="{{ old('password') }}" id="password" placeholder="Mật khẩu">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </li>
                                        <li>
                                            <input name="password_confirmation" required type="password" value="{{ old('password_confirmation') }}" class="tb validate[required]" id="password" placeholder="Mật khẩu">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </li>
                                        <li class="btns">
                                            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

                                            {{--                                            <input name="submit" type="submit" id="btnSubmit" class="htmlBtn first" value="Đăng ký">--}}
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
    #create_customer > form > ul > li {
        margin-bottom: 30px;
    }

    #create_customer > form > ul > li.btns {
        margin-bottom: 0;
    }
    .errors li{
        padding: 10px 0 0 10px;
        color: red;
    }
</style>
