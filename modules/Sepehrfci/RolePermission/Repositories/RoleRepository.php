<?php

namespace Sepehrfci\RolePermission\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function all()
    {
        return Role::all();
    }

    public function findById($id)
    {
        return Role::query()->findOrFail($id);
    }

    public function update($request,$role)
    {
        return $role->syncPermissions($request->permissions)->update(['name' => $request->name]);
    }

    public function create($request)
    {
        return Role::create(['name' => $request->name])->syncPermissions($request->permissions);
    }

    public function delete($id)
    {
        return Role::query()->findOrFail($id)->delete();
    }
}
