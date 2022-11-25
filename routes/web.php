<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/search', \App\Http\Controllers\Search\SearchController::class)->name('search.index');

Route::group(['namespace'  => 'App\Http\Controllers\Admin', 'prefix' => 'admin'],
    function(){
        Route::get('/', Home\AdminController::class);
        Route::post('/search', Search\SearchUserController::class)->name('search.user');
        Route::patch('/settings', Settings\UpdateContoller::class)->name('settings.update');
        Route::get('/settings', Settings\IndexContoller::class)->name('settings.index');

        Route::resource('/category', Category\CategoryController::class);
        Route::resource('/user', User\UserController::class);
        Route::resource('/parts', Parts\PartsController::class);
        Route::resource('/brands', BrandAuto\BrandAutoController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
