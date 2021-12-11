<!DOCTYPE html>
<html lang="fa">
<head>
    @include('Dashboard::layouts.head')
</head>
<body>
    @include('Dashboard::layouts.sidebar')
<div class="content">
    @include('Dashboard::layouts.header')
    <div class="main-content">
        @yield('content')
    </div>
</div>
</body>
    @include('Dashboard::layouts.scripts')
</html>
