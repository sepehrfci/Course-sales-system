<?php

use Illuminate\Support\Facades\Route;

use Sepehrfci\RolePermission\Http\Controllers\PermissionController;
use Sepehrfci\RolePermission\Http\Controllers\RolePermissionController;

Route::prefix('dashboard')->middleware(['web','auth','verified'])->group(function () {
    Route::resource('roles-permissions',RolePermissionController::class);
    Route::post('roles-permissions/permissions/store',[PermissionController::class,'store'])
        ->name('permissions.store');
});
