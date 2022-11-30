<?php

use Illuminate\Support\Facades\Route;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::group(['namespace' => 'App\Http\Controllers\Shop'],
    function () {
        Route::post('/parts_search', Home\SearchController::class)->name('shop.search.index');
        Route::post('/{part}', Other\StoreController::class)->name('shop.wishlist.store');
        Route::get('/', Home\IndexController::class)->name('shop.home.index');
        Route::get('/contact', Other\ContactsController::class)->name('shop.contacts');
        Route::get('/about', Other\AboutController::class)->name('shop.about');

        Route::group(['namespace' => 'Shop\Category', 'prefix' => 'category'], function () {
            Route::get('/', IndexController::class)->name('shop.category.index');
            Route::get('/{category}', ShowController::class)->name('shop.category.show');
        });

        Route::resource('/parts_shop', Shop\ShopShowController::class);


        Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => 'auth'],
            function () {
                Route::get('/', IndexController::class)->name('personal.index');

                Route::resource('/wishlist', WishlistController::class);
            });
    });


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'],
    function () {
        Route::get('/', Home\AdminController::class);
        Route::post('/search_user', Search\SearchUserController::class)->name('search.user');
        Route::patch('/settings', Settings\UpdateContoller::class)->name('settings.update');
        Route::get('/settings', Settings\IndexContoller::class)->name('settings.index');
        Route::post('/search_parts', Search\SearchController::class)->name('search.index');

        Route::resource('/category', Category\CategoryController::class);
        Route::resource('/user', User\UserController::class);
        Route::resource('/parts', Parts\PartsController::class);
        Route::resource('/brands', BrandAuto\BrandAutoController::class);


    });






