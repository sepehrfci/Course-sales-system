@extends('myauth.master')
@section('title','صفحه فراموشی رمز عبور')
@section('content')
    <form action="{{ route('password.email') }}" class="form" method="post">
        @csrf
        <a class="account-logo" href="/">
            <img src="img/weblogo.png" alt="logo">
        </a>

        <div class="form-content form-account">
            <input id="email" name="email" type="email" value="{{ old('email') }}" class="txt-l txt"
                   placeholder="ایمیل" required autofocus>
            <br>
            @error('email')
            <p> {{ $message }}</p>
            @enderror
            <button class="btn btn-recoverpass">بازیابی</button>
            @if(session()->has('status'))
                <strong class="text-success mt-4">{{session()->get('status')}}</strong>
            @endif
        </div>

        <div class="form-footer">
            <a href="{{ route('login') }}">صفحه ورود</a>
        </div>
    </form>
@endsection

