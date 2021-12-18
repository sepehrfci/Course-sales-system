<?php

namespace Sepehrfci\RolePermission\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sepehrfci\RolePermission\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        Permission::create(['name' => $request->name]);
        $inp = file_get_contents(__DIR__ . '/../../Resources/Lang/fa.json');
        $tempArray = json_decode($inp,true);
        $tempArray[$request->name] = $request->name_fa;
        $jsonData = json_encode($tempArray);
        \File::put(__DIR__ . '/../../Resources/Lang/fa.json',$jsonData);
        return back()->with(['success' => 'دسترسی مورد نظر با موفقیت ایجاد شد.']);
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

        $permission = Permission::query()->findOrFail($id);

        $inp = file_get_contents(__DIR__ . '/../../Resources/Lang/fa.json');
        $tempArray = json_decode($inp,true);
        $name_fa = $tempArray[$permission->name];
        return view('RolePermission::edit-permissions',compact('permission','name_fa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
