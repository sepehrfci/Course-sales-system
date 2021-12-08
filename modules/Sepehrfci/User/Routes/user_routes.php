<?php

use Illuminate\Support\Facades\Route;
use Sepehrfci\User\Http\Controllers\Auth\VerifyEmailController;

Route::group(['namespace' => 'Sepehrfci\User\Http\Controllers','middleware' => 'web'], function (){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth','verified'])->name('dashboard');

    require __DIR__.'/auth.php';

    Route::post('verify-email',[VerifyEmailController::class,'verify'])->name('verification.verify');
});
