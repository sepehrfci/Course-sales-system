<?php

namespace Sepehrfci\RolePermission\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sepehrfci\RolePermission\Http\Requests\RoleRequest;
use Sepehrfci\RolePermission\Http\Requests\RoleUpdateRequest;
use Sepehrfci\RolePermission\Repositories\PermissionRepository;
use Sepehrfci\RolePermission\Repositories\RoleRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    private RoleRepository $roleRepository;
    private PermissionRepository $permissionRepository;
    public function __construct(RoleRepository $roleRepository,PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepository->all();
        $permissions = $this->permissionRepository->all();
        return view('RolePermission::index',compact('roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleRepository->create($request);
        return back()->with(['success'=>"نقش {$role->name} با موفقیت ایجاد شد."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->findById($id);
        $permissions = $this->permissionRepository->all();
        return view('RolePermission::edit',compact('role' , 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = $this->roleRepository->findById($id);
        $this->roleRepository->update($request,$role);
        return redirect(route('roles-permissions.index'))->with([
           'success' => "نقش {$role->name}با موفقیت بروزرسانی شد."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->roleRepository->delete($id);
        return response()->json(['message' => 'حذف نقش با موفقیت انجام شد.'],200);
    }
}
