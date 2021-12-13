<?php

use Illuminate\Support\Facades\Route;

use Sepehrfci\RolePermissoion\Http\Controllers\RolePermissionController;

Route::prefix('dashboard')->middleware(['web','auth','verified'])->group(function () {
    Route::resource('roles-permissions',RolePermissionController::class);
});

