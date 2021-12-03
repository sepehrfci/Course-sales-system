@extends('myauth.master')
@section('title','صفحه ورود')
@section('content')
    <form action="{{ route('login') }}" class="form" method="post">
        @csrf
        <a class="account-logo" href="/">
            <img src="img/weblogo.png" alt="logo">
        </a>
        <div class="form-content form-account">
            <input id="email" name="email" type="email" class="txt-l txt" placeholder="ایمیل یا شماره موبایل"
            value="{{ old('email') }}" autofocus autocomplete="email">
            @error('email')
                <p> {{ $message }}</p>
            @enderror
            <input id="password" name="password" type="password"class="txt-l txt" placeholder="رمز عبور"
                   required autocomplete="current-password">
            @error('password')
            <p> {{ $message }}</p>
            @enderror
            <br>
            <button class="btn btn--login">ورود</button>
            <label class="ui-checkbox">
                مرا بخاطر داشته باش
                <input id="remember_me" type="checkbox" >
                <span class="checkmark"></span>
            </label>

            <div class="recover-password">
                <a href="{{route('password.request')}}">بازیابی رمز عبور</a>
            </div>
        </div>
        <div class="form-footer">
            <a href="{{ route('register') }}">صفحه ثبت نام</a>
        </div>
    </form>
@endsection
