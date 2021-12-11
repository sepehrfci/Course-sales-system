<?php
use Illuminate\Support\Facades\Route;

//Route::group(['namespace' => 'Sepehrfci\Dashboard\Http\Controllers','middleware' => 'web'], function (){
//
//    Route::prefix('/dashboard')->group(function (){
//
//        Route::get('/', function () {
//            return view('Dashboard::master');
//        })->middleware(['auth','verified'])->name('dashboard');
//
//    });
//});

Route::prefix('/dashboard')->namespace('Sepehrfci\Dashboard\Http\Controllers')
    ->middleware(['web','auth','verified'])->group(function (){

    Route::get('/', function () {
        return view('Dashboard::index');
    })->name('dashboard');

});

