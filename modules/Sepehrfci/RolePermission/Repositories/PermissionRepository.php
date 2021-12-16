<?php

namespace Sepehrfci\RolePermission\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository
{
    public function all()
    {
        return Permission::all();
    }
}
