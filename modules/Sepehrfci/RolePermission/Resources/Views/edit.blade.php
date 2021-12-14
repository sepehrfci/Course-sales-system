@extends('Dashboard::master')
@section('title','بروزرسانی نقش')
@section('breadcrumb')
    <li><a href="{{ route('roles-permissions.index') }}" title="سطوح دسترسی">سطوح دسترسی</a></li>
    <li><a href="#" title="بروزرسانی نقش">بروزرسانی نقش</a></li>
@endsection
@section('content')
    <div class="padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-4 bg-white">
                <p class="box__title">بروزرسانی نقش</p>
                <form action="{{ route('roles-permissions.update',$role->id) }}" method="post" class="padding-30">
                    @csrf
                    @method('patch')
                    <input name="title" type="text" placeholder="عنوان نقش" class="text"
                           value="{{ $role->title }}">
                    @error('title')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسترسی ها</p>

                    <button class="btn btn-webamooz_net">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
@stop


