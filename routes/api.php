<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', fn () => []);

Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});

