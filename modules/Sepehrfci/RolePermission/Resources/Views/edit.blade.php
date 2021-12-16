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
                    <input name="id" type="hidden" value="{{ $role->id }}">
                    <input name="name" type="text" placeholder="عنوان نقش" class="text"
                           value="{{ $role->name }}">
                    @error('name')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسترسی ها</p>
                    @foreach($permissions as $permission)
                        <label class="ui-checkbox pt-1 pr-2">
                            <input name="permissions[{{ $permission->id }}]" type="checkbox"
                                   class="checkedAll" value="{{ $permission->name }}"
                                   @if($role->hasPermissionTo($permission->name))
                                   checked
                                @endif
                            >
                            <span class="checkmark"></span>
                            @lang($permission->name)
                        </label>
                    @endforeach
                    @error('permissions')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <button class="btn btn-webamooz_net mt-2">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
@stop


