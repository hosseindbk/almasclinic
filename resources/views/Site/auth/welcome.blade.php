@extends('layouts.user')
@section('title')
    <title>به وبسایت کلینیک الماس خوش آمدید</title>
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg">
            <section class="page-account-box">
                <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                    <div class="ds-userlogin">
                        <div class="ds-userlogin text-center">
                            <div class="account-box">
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <h1 class="mb-2" style="font-size: 20px">{{ Auth::user()->name }} عزیز به کلینیک الماس خوش آمدید</h1>

                                            <div class="user-account-welcome">
                                                <img src="{{asset('site/images/logo-white.png')}}">
                                            </div>
                                            <div class="made-account">
                                                <h2>{{ Auth::user()->name }} حساب کاربری شما در کلینیک الماس ساخته شد</h2>
                                            </div>

                                            <div class="form-row-account">
                                                <a href="{{url('/')}}" class="btn btn-primary btn-login">بازگشت به وبسایت </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
@endsection
