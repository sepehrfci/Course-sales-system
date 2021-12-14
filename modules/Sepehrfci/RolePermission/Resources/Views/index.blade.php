@extends('Dashboard::master')
@section('title','دسته بندی ها')
@section('breadcrumb')
    <li><a href="{{ route('roles-permissions.index') }}" title="سطوح دسترسی">سطوح دسترسی</a></li>
@endsection
@section('style')
    <link rel="stylesheet" href="/panel/css/materialNotify.css">
@stop
@section('content')
    <div class="padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">سطوح دسترسی</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>عنوان نقش</th>
                            <th>دسترسی ها</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr role="row" class="">
                                <td><a href="">{{ $role->id }}</a></td>
                                <td><a href="">{{ $role->name }}</a></td>
                                <td> permissions </td>
                                <td>
                                    <a href=""
                                       onclick="
                                           event.preventDefault();
                                           deleteItem(event,'{{route('roles-permissions.destroy',$role->id)}}')"
                                       class="item-delete mlg-15" title="حذف"></a>
                                    <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                    <a href="{{ route('roles-permissions.edit' , $role->id) }}" class="item-edit "
                                       title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد نقش جدید</p>
                <form action="{{ route('roles-permissions.store') }}" method="post" class="padding-30">
                    @csrf
                    <input name="name" type="text" placeholder="عنوان نقش" class="text" value="{{ old('name') }}">
                    @error('name')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسترسی ها</p>
                        @foreach($permissions as $permission)
                        <label class="ui-checkbox pt-1 pr-2">
                            <input name="permissions[{{ $permission->id }}]" type="checkbox"
                                   class="checkedAll" value="{{ $permission->name }}"
                                   @if(is_array(old('permissions')) && array_key_exists($permission->id,old('permissions')))
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
                    <button class="btn btn-webamooz_net mt-2">اضافه کردن</button>
                </form>
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
    <script>
        function deleteItem (event , route)
        {
            if (confirm('آیا از حذف این دسته بندی مطئن هستید؟')){
                $.post(route,{_method : 'delete', _token : '{{ csrf_token() }}' })
                    .done(function (response){
                        event.target.closest('tr').remove();
                        notify(response.message, 3,false);
                    })
                    .fail(function (response){

                    })
            }

        }
    </script>
@endsection
