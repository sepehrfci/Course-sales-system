@extends('User::Auth.master')
@section('title','صفحه بازیابی حساب کاربری')
@section('content')
    <form action="{{ route('password.update') }}" class="form" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <a class="account-logo" href="/">
            <img src="/img/weblogo.png" alt="logo">
        </a>
        @if(session()->has('status'))
            <strong class="text-success mt-4">{{session()->get('status')}}</strong>
        @endif
        <div class="form-content form-account">
            <input id="email" name="email" type="email" value="{{ old('email',$request->email) }}" class="txt-l txt"
                   placeholder="ایمیل" required >
            <br>
            @error('email')
            <p> {{ $message }}</p>
            @enderror
            <input id="password" name="password" type="password" class="txt txt-l" placeholder="رمز عبور جدید"
                   required autofocus>
            <input id="password_confirmation" name="password_confirmation" type="password" class="txt txt-l"
                   placeholder="تکرار رمز عبور جدید" required>
            <span class="rules">
                رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
            <br>
            @error('password')
            <p>{{ $message }}</p>
            @enderror()
            <button class="btn btn-recoverpass">بازیابی رمز عبور</button>
        </div>
        <div class="form-footer">
            <a href="{{ route('login') }}">صفحه ورود</a>
        </div>
    </form>
@endsection

