@extends('myauth.master')
@section('title','صفحه ثبت نام')
@section('content')
    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <a class="account-logo" href="index.html">
            <img src="img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
            <input id="name" name="name" type="text" class="txt" value="{{ old('name') }}"
                   placeholder="نام و نام خانوادگی" required autofocus >
            @error('name')
                <p>{{ $message }}</p>
            @enderror()
            <input id="email" name="email" type="email" value="{{ old('email') }}" class="txt txt-l"
                   placeholder="ایمیل" required>
            @error('email')
            <p>{{ $message }}</p>
            @enderror()
            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="txt txt-l"
                   placeholder="شماره موبایل">
            @error('phone')
            <p>{{ $message }}</p>
            @enderror()
            <input id="password" name="password" type="password" class="txt txt-l" placeholder="رمز عبور" required>
            <input id="password_confirmation" name="password_confirmation" type="password" class="txt txt-l" placeholder="تکرار رمز عبور" required>
            <span class="rules">
                رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
            <br>
            @error('password')
            <p>{{ $message }}</p>
            @enderror()
            <button class="btn continue-btn">ثبت نام و ادامه</button>

        </div>
        <div class="form-footer">
            <a href="{{ route('login') }}">صفحه ورود</a>
        </div>
    </form>
@endsection

