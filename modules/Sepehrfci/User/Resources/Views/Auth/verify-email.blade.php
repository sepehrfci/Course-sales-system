@extends('User::Auth.master')
@section('title','صفحه تایید ایمیل')
@section('content')
    <div class="form" >
        <a class="account-logo" href="/">
        <img src="img/weblogo.png" alt="logo">
        </a>
        <div class="card-header">
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    ایمیل جدید ارسال شد
                </div>
            @endif
            <p class="activation-code-title">کد فرستاده شده به ایمیل  <span>{{ auth()->user()->email }}</span>
                را در کادر زیر وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
            </p>
                <div class="form-content form-content1">
                    <form action="" method="POST">
                        @csrf
                        <input name="verify_code" class="activation-code-input" placeholder="فعال سازی">
                        @error('verify_code')
                            <br>
                            <strong> {{ $message }}</strong>
                        @enderror
                        <br>
                        <button class="btn i-t">تایید</button>
                    </form>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="form-content">
                            <button type="submit" class="btn btn-recoverpass i-t">ارسال مجدد لینک فعال سازی</button>
                        </div>
                    </form>
                </div>

        </div>
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
@section('js')
    <script src="/js1/jquery-3.4.1.min.js"></script>
    <script src="/js1/activation-code.js"></script>
@endsection

