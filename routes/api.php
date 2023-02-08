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

//auth
Route::group( [ 'middleware' => 'api', 'prefix' => 'auth' ], static function( $router ) {
    Route::post( 'login', [ \App\Http\Controllers\AuthController::class, 'login' ] );
    Route::post( 'loginAdmin', [ \App\Http\Controllers\AuthController::class, 'loginAdmin' ] );
    Route::post( 'logout', [ \App\Http\Controllers\AuthController::class, 'logout' ] );
    Route::post( 'refresh', [ \App\Http\Controllers\AuthController::class, 'refresh' ] );
    Route::post( 'me', [ \App\Http\Controllers\AuthController::class, 'me' ] );
    Route::post( 'edit', \App\Http\Controllers\API\client\User\EditController::class );
} );
//client auth personal
Route::group( [ 'middleware' => 'jwt.auth' ], static function() {
    Route::post( '/getWishlist', \App\Http\Controllers\API\client\Wishlist\IndexController::class );
    Route::post( '/getWishlistCheck', \App\Http\Controllers\API\client\Wishlist\IndexCheckController::class );
    Route::post( '/wishlist/{part}', \App\Http\Controllers\API\client\Wishlist\StoreController::class );
    Route::post( '/orders', \App\Http\Controllers\API\client\Order\IndexController::class );
    Route::post( '/orders/edit/{order}', \App\Http\Controllers\API\client\Order\LabelOrderEditController::class );
    Route::resource( '/garage', \App\Http\Controllers\API\client\Garage\GarageController::class );
} );
//client public shop
Route::get( '/parts', \App\Http\Controllers\API\client\Parts\PartsController::class );
Route::get( '/parts/show/{part}', \App\Http\Controllers\API\client\Parts\ShowPartController::class );
Route::get( '/index/brands', \App\Http\Controllers\API\client\Index\IndexController::class );
Route::get( '/search', \App\Http\Controllers\API\client\SearchController::class );
Route::get( '/oem_search', \App\Http\Controllers\API\client\SearchOemController::class );
Route::get( '/brand', \App\Http\Controllers\API\client\Brands\IndexController::class );
Route::get( '/brand/{brand}', \App\Http\Controllers\API\client\Brands\ShowController::class );
Route::get( '/delivery_companies', \App\Http\Controllers\API\client\DeliveryCompanies\IndexController::class);
Route::post( '/brand/show/{brand}', \App\Http\Controllers\API\client\Brands\ShowShopController::class );
Route::post( '/order', \App\Http\Controllers\API\client\Order\StoreController::class );
Route::post( '/vin_request', \App\Http\Controllers\API\client\VinRequest\StoreController::class );
Route::post( '/auth/register', \App\Http\Controllers\API\client\User\RegisterController::class );

//admin panel auth
Route::group( ['prefix'=>'admin','middleware' => ['jwt.auth','admin'] ], static function() {
    Route::resource( '/brands', \App\Http\Controllers\API\admin\BrandAuto\BrandAutoController::class );
    Route::resource( '/parts', \App\Http\Controllers\API\admin\Parts\PartsController::class );
    Route::resource( '/tags', \App\Http\Controllers\API\admin\Tag\TagController::class );
    Route::resource( '/categories', \App\Http\Controllers\API\admin\Category\CategoryController::class );
    Route::resource( '/replace', \App\Http\Controllers\API\admin\Replace\ReplaceController::class );
    Route::resource( '/suppliers', \App\Http\Controllers\API\admin\Supplier\SupplierController::class );
    Route::resource( '/delivery_company', \App\Http\Controllers\API\admin\DeliveryCompanies\DeliveryCompanyController::class );
    Route::resource( '/users', \App\Http\Controllers\API\admin\User\UserController::class );
    Route::resource( '/orders', \App\Http\Controllers\API\admin\Orders\OrdersController::class );
    Route::resource( '/vin_requests', \App\Http\Controllers\API\admin\VinRequest\VinRequestController::class );

    Route::get('/settings', \App\Http\Controllers\API\admin\Settings\IndexController::class);
    Route::patch('/settings/update', \App\Http\Controllers\API\admin\Settings\UpdateController::class);
    Route::get('/search', \App\Http\Controllers\API\admin\Search\SearchUserOrPartsController::class);
    Route::post('/order_add_search', \App\Http\Controllers\API\admin\Search\SearchForOrderController::class);
    Route::post('/import_price', \App\Http\Controllers\API\admin\Settings\Import\PartsImportController::class);
    Route::post('/update_parts', \App\Http\Controllers\API\admin\Settings\Import\UpdatePartController::class);
    Route::post('/import', \App\Http\Controllers\API\admin\Settings\Import\IndexController::class);
    Route::post('/notification', \App\Http\Controllers\API\admin\Notification\NavbarController::class);
    Route::post('/all_orders', \App\Http\Controllers\API\admin\Orders\IndexController::class);
    Route::post('/vin_all_request', \App\Http\Controllers\API\admin\VinRequest\IndexController::class);
    Route::post('/wishlist_count', \App\Http\Controllers\API\admin\Home\IndexController::class);
} );