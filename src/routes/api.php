<?php

use App\Http\Controllers\ProductController;
use App\Http\Resources\Product;
use App\Services\Api\ProductHttpService;
use Illuminate\Http\Request;
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

Route::middleware(['addAccessToken', 'auth:sanctum'])->prefix('v1')->group(function(){

   Route::get('/user', function(Request $request) {
       return $request->user();
   });

   Route::apiResource('products', ProductController::class);

   Route::get('/products/{sku}/cover/{size}', [ProductController::class, 'getCoverImage'])->name('coverImages');

});

