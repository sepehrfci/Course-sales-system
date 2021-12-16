<div class="col-12 bg-white margin-bottom-15">
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
