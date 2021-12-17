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
        //Permission::create(['name' => $request->name]);

        $inp = file_get_contents(__DIR__ . '/../../Resources/Lang/fa.json');
        $tempArray = json_decode($inp);

        dd($tempArray);
        array_push($tempArray, [$request->name => $request->name_fa]);
        $jsonData = json_encode($tempArray);

        dd($jsonData);
        \File::put(__DIR__ . '/../../Resources/Lang/fa.json',$jsonData);
        //return back()->with(['message' => 'دسترسی مورد نظر با موفقیت ایجاد شد.']);
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
