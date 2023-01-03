<?php /** @noinspection PhpUndefinedNamespaceInspection */

/** @noinspection PhpUndefinedClassInspection */

use Illuminate\Support\Facades\Route;

//Route::get( '{page}', \App\Http\Controllers\Client\IndexController::class )->where('page', '.*');

//
//Route::resource( '/order', \App\Http\Controllers\Shop\Order\OrderController::class );
//
//
//
//Route::group( [ 'namespace' => 'App\Http\Controllers\Shop', 'prefix' => '/' ],
//function() {
//        Route::get( '/parts_search', Home\SearchController::class )->name( 'shop.search.index' );
//        Route::post( '/wishlist/{part}', Other\StoreController::class )->name( 'shop.wishlist.store' );
//        Route::post( '/add_to_cart', Cart\StoreController::class )->name( 'cart.store' );
//        Route::post( '/remove_in_cart/{part}', Cart\RemoveController::class )->name( 'cart.deleting' );
//        Route::get( '/cart',Cart\IndexController::class )->name( 'cart.index' );
//        Route::get( '/contact', Other\ContactsController::class )->name( 'shop.contacts' );
//        Route::get( '/about', Other\AboutController::class )->name( 'shop.about' );
//
//        Route::group( [ 'namespace' => 'Shop\Category', 'prefix' => 'category' ], function() {
//            Route::get( '/', IndexController::class )->name( 'shop.category.index' );
//            Route::get( '/{category}', ShowController::class )->name( 'shop.category.show' );
//        } );
//
//        Route::get( '/parts_shop/{part}', Shop\ShopShowController::class )->name( 'parts_shop.show' );
//
//        Route::group( [ 'namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => 'auth' ],
//            function() {
//                Route::get( '/', IndexController::class )->name( 'personal.index' );
//
//                Route::resource( '/wishlist', WishlistController::class );
//            } );
//    } );


Route::group( [ 'namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin' ],
    static function() {
        Route::get( '/', Home\AdminController::class )->name( 'admin.index' );
        Route::get( '/search_user', Search\SearchUserController::class )->name( 'search.user' );
        Route::patch( '/settings', Settings\UpdateContoller::class )->name( 'settings.update' );
        Route::get( '/settings', Settings\IndexContoller::class )->name( 'settings.index' );
        Route::get( '/search_parts', Search\SearchController::class )->name( 'search.index' );
        Route::post( '/import', Import\PartsImportController::class )->name( 'import.parts' );
        Route::get( '/import/index', Import\IndexController::class )->name( 'import.index' );

        Route::resource( '/category', Category\CategoryController::class );
        Route::resource( '/user', User\UserController::class );
        Route::resource( '/parts', Parts\PartsController::class );
        Route::resource( '/brands', BrandAuto\BrandAutoController::class );
        Route::resource( '/tags', Tag\TagController::class );


    } );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
