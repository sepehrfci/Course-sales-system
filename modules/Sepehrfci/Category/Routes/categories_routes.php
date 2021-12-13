<?php

use Illuminate\Support\Facades\Route;
use Sepehrfci\Category\Http\Controllers\CategoryController;

Route::prefix('dashboard')->middleware(['web','auth','verified'])->group(function (){

    Route::resource('categories',CategoryController::class);

});
