@extends('myauth.master')
@section('title','صفحه تایید ایمیل')
@section('content')
    <div action="" class="form" method="post">
        <a class="account-logo" href="index.html">
        <img src="img/weblogo.png" alt="logo">
        </a>
        <div class="card-header">
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    ایمیل جدید ارسال شد
                </div>
            @endif
            <p class="activation-code-title">بر روی لینک فرستاده شده به ایمیل  <span>{{ \Illuminate\Support\Facades\Auth::user()->email }}</span>
                کلیک کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
            </p>
        </div>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="form-content form-content1">
                <button type="submit" class="btn btn-recoverpass i-t">ارسال مجدد لینک فعال سازی</button>
            </div>
        </form>
            <div class="form-footer">
                @if(auth()->user())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn" type="submit">خروج از سیستم</button>
                    </form>
                @endif
            </div>
    </div>
@endsection


