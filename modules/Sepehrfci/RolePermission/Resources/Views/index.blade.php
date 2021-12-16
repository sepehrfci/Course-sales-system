@extends('Dashboard::master')
@section('title','سطوح دسترسی')
@section('breadcrumb')
    <li><a href="{{ route('roles-permissions.index') }}" title="سطوح دسترسی">سطوح دسترسی</a></li>
@endsection
@section('style')
    <link rel="stylesheet" href="/panel/css/materialNotify.css">
@stop
@section('content')
    <div class="padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-20">
                @include('RolePermission::roles-list')
                @include('RolePermission::permissions-list')
            </div>
            <div class="col-3">
                @include('RolePermission::roles-create')
                @include('RolePermission::permissions-create')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/panel/js/tagsInput.js"></script>
    <script src="/panel/js/materialNotify.js"></script>
    @if(session('success'))
        <script>
            notify("{{ session('success') }}", 3, false);
        </script>
    @endif
@endsection
