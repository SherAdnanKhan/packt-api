<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestAPIController;
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


Route::group(['middleware' => ['addAccessToken', 'auth:sanctum'], 'prefix' => 'v1'], function(){

   Route::get('test', [TestAPIController::class, 'index'])->name('test')->middleware('accessTokenPermission:TEST');


   Route::apiResource('products', ProductController::class)->middleware('accessTokenPermission:PI');
   Route::apiResource('authors', AuthorController::class)->only('index');


    Route::group(['prefix' => '/products/{sku}', 'middleware' => 'accessTokenPermission:PI'], function () {

        Route::get('/cover/{size}', [ProductController::class, 'getCoverImage'])->name('coverImages');

        Route::get('authors', [ProductController::class, 'getAuthors'])->name('productAuthors');

        Route::get('/files/{type}', [ProductController::class, 'getFiles'])
            ->name('productFiles')
            ->middleware(['accessTokenPermission:CONTENT','entitlementAccess']);
        Route::get('price/{code?}', [ProductController::class, 'getPrice'])->name('productPrice');
    });

});

Route::fallback(function () {
    return response()->json(['errorMessage' => 'Resource not found'], 404);
});

