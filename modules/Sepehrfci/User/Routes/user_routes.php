<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Sepehrfci\User\Http\Controllers','middleware' => 'web'], function (){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth','verified'])->name('dashboard');

    require __DIR__.'/auth.php';
});
