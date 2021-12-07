@extends('User::Auth.master')
@section('title','صفحه تایید رمز عبور')
@section('content')
        <form action="{{ route('password.confirm.post') }}" class="form" method="post">
            @csrf
            <a class="account-logo" href="/">
                <img src="/img/weblogo.png" alt="logo">
            </a>
            <div class="form-content form-account">
                <input type="password" id="password" name="password" class="txt-l txt"
                       placeholder="رمز عبور خود را وارد کنید">
                <br>
                <button type="submit" class="btn btn-recoverpass">تایید رمز عبور</button>
            </div>
            <div class="form-footer">

            </div>
        </form>
@endsection

