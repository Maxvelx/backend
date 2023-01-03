<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::middleware( 'auth:sanctum' )->get( '/user', function( Request $request ) {
//    return $request->user();
//} );


Route::group( [ 'middleware' => 'api', 'prefix' => 'auth' ], static function( $router ) {
    Route::post( 'login', [ \App\Http\Controllers\AuthController::class, 'login' ] );
    Route::post( 'logout', [ \App\Http\Controllers\AuthController::class, 'logout' ] );
    Route::post( 'refresh', [ \App\Http\Controllers\AuthController::class, 'refresh' ] );
    Route::post( 'me', [ \App\Http\Controllers\AuthController::class, 'me' ] );

} );

Route::group( [ 'middleware' => 'jwt.auth' ], static function() {
    Route::post( '/getWishlist', \App\Http\Controllers\API\client\Wishlist\IndexController::class );
    Route::post( '/getWishlistCheck', \App\Http\Controllers\API\client\Wishlist\IndexCheckController::class );
    Route::post( '/wishlist/{part}', \App\Http\Controllers\API\client\Wishlist\StoreController::class );
    Route::post( '/orders', \App\Http\Controllers\API\client\Order\IndexController::class );
} );


Route::get( '/parts', \App\Http\Controllers\API\client\Parts\PartsController::class );
Route::get( '/parts/show/{part}', \App\Http\Controllers\API\client\Parts\ShowPartController::class );
Route::get( '/index/brands', \App\Http\Controllers\API\client\Index\IndexController::class );
Route::get( '/search', \App\Http\Controllers\API\client\SearchController::class );
Route::get( '/brand', \App\Http\Controllers\API\client\Brands\IndexController::class );
Route::get( '/brand/{brand}', \App\Http\Controllers\API\client\Brands\ShowController::class );
Route::post( '/brand/show/{brand}', \App\Http\Controllers\API\client\Brands\ShowShopController::class );
Route::get( '/category', \App\Http\Controllers\API\client\Category\IndexController::class );
Route::post( '/order', \App\Http\Controllers\API\client\Order\StoreController::class );


Route::group( ['prefix'=>'admin'], static function() {
    Route::resource( '/brands', \App\Http\Controllers\API\admin\BrandAuto\BrandAutoController::class );
    Route::resource( '/parts', \App\Http\Controllers\API\admin\Parts\PartsController::class );

} );
