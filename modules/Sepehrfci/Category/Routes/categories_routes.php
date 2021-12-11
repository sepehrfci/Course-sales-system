<?php

use Illuminate\Support\Facades\Route;
use Sepehrfci\Category\Http\Controllers\CategoryController;

Route::prefix('dashboard')->namespace('Sepehrfci\Category\Http\Controllers')
    ->middleware(['web','auth','verified'])->group(function (){

    Route::resource('categories','CategoryController');

});
