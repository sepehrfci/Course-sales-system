@component('mail::message')
# کد تایید آدرس ایمیل

اگر ثبت نامی توسط شما صورت نگرفته ، این ایمیل را نادیده بگیرید.

@component('mail::panel')
کد : {{ $code }}
@endcomponent

با تشکر<br>
{{ config('app.name') }}
@endcomponent
