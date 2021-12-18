@extends('Dashboard::master')
@section('title','بروزرسانی دسترسی')
@section('breadcrumb')
    <li><a href="{{ route('permissions.edit') }}" title="سطوح دسترسی">سطوح دسترسی</a></li>
    <li><a href="#" title="بروزرسانی دسترسی">بروزرسانی دسترسی</a></li>
@endsection
@section('content')
    <div class="padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-4 bg-white">
                <p class="box__title">بروزرسانی دسترسی</p>
                <form action="{{ route('permissions.update',$permission->id) }}" method="post" class="padding-30">
                    @csrf
                    @method('patch')
                    <input name="id" type="hidden" value="{{ $permission->id }}">
                    <input name="name" type="text" placeholder="عنوان دسترسی(انگلیسی)" class="text"
                           value="{{ $permission->name }}">
                    @error('name')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <input name="name_fa" type="text" placeholder="عنوان دسترسی(فارسی)" class="text"
                           value="ghjk">
                    @error('name_fa')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <button class="btn btn-webamooz_net mt-2">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
@stop


