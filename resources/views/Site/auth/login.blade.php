@extends('layouts.user')
@section('title')
<title>ورود کاربران کلینیک الماس</title>
@endsection
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <section class="page-account-box">
                    <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                        <div class="ds-userlogin" style="text-align: center;">
                            <div class="account-box">
                                <div class="account-box-headline">
                                    <a href="{{url('login')}}" class="login-ds active">
                                        <span class="title">ورود</span>
                                    </a>
                                    <a href="{{url('register')}}" class="register-ds">
                                        <span class="title">عضویت</span>
                                    </a>
                                </div>
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <h1 style="font-size: 20px;">ورود به حساب کاربری کلینیک زیبایی الماس</h1>
                                        <form method="POST" action="{{ route('login-user') }}" class="form-account text-right">
                                            @csrf
                                            <div class="form-account-title">
                                                <label for="phone">شماره موبایل</label>
                                                <input type="text" name="phone" value="{{ old('mobile') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="number-email-input text-left @error('mobile') is-invalid @enderror" >
                                            </div>
                                            <div class="form-row-account">
                                                <button class="btn btn-primary btn-login">ورود</button>
                                            </div>
                                        </form>
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
