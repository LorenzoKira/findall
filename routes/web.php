<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController ;
Route::get('/', fn () => view('welcome'));


Route::controller(AuthController::class)->prefix('auth/')->name('auth.')->group(function() {

    Route::get('sign-up', 'sign_up');
    Route::get('sign-in', 'sign_in');

});