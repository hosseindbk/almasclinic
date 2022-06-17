@extends('layouts.user')
@section('title')
<title>عضویت در کلینیک زیبایی الماس</title>
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
                                    <a href="{{url('login')}}" class="login-ds ">
                                        <span class="title">ورود</span>
                                    </a>
                                    <a href="{{url('register')}}" class="register-ds active">
                                        <span class="title">عضویت</span>
                                    </a>
                                </div>
                                <div class="Login-to-account mt-4">
                                    <div class="account-box-content">
                                        <h1 style="font-size: 20px">عضویت در کلینیک زیبایی الماس</h1>
                                        <form method="POST" action="{{ route('register') }}" class="form-account text-right">
                                            @csrf
                                            <div class="form-account-title">
                                                <label for="email-phone"> نام و نام خانوادگی</label>
                                                <input type="text" name="name" class="text-right number-email-input" >
                                                <input type="hidden" name="level" value="user" >
                                            </div>
                                            <div class="form-account-title">
                                                <label for="email-phone"> شماره موبایل</label>
                                                <input type="text" name="phone" class="number-email-input text-left" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                            </div>
                                            <div class="form-row-account">
                                                <button class="btn btn-primary btn-register">عضویت</button>
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
@endsection
