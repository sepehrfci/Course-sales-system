<div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
    <p class="box__title">نقش ها</p>
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
                    <td>
                        <ul>
                            @foreach($permissions as $permission)
                                @if($role->hasPermissionTo($permission->name))
                                    <li>@lang($permission->name)</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href=""
                           onclick="
                               deleteItem(event,'{{route('roles-permissions.destroy',$role->id)}}')"
                           class="item-delete mlg-15" title="حذف"></a>
                        <a href="{{ route('roles-permissions.edit' , $role->id) }}" class="item-edit "
                           title="ویرایش"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
