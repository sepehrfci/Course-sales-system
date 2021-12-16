<div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
    <p class="box__title">سطوح دسترسی</p>
    <div class="table__box">
        <table class="table">
            <thead role="rowgroup">
            <tr role="row" class="title-row">
                <th>شناسه</th>
                <th>عنوان سطح دسترسی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr role="row" class="">
                    <td><a href="">{{ $permission->id }}</a></td>
                    <td><a href="">@lang($permission->name)</a></td>
                    <td>
                        <a href=""
                           onclick="
                               deleteItem(event,'{{route('roles-permissions.destroy',$permission->id)}}')"
                           class="item-delete mlg-15" title="حذف"></a>
                        <a href="{{ route('roles-permissions.edit' , $permission->id) }}" class="item-edit "
                           title="ویرایش"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
