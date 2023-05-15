<?php

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



use App\Http\Controllers\APiPassportAuthController;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ShopifyController;
use App\Http\Controllers\ApiBenchmarkController;

Route::get('/products', [ApiProductController::class, 'index']);
 

Route::post('register', [ApiPassportAuthController::class, 'register']);
Route::post('login', [ApiPassportAuthController::class, 'login']);
Route::post('forgot-password', [ApiPassportAuthController::class, 'forgotPassword']);
Route::post('reset-password', [ApiPassportAuthController::class, 'resetPassword']);
Route::group(['prefix' => 'benchmark'], function () {
    Route::get('/', ApiBenchmarkController::class)->name('shopify.api.benchmarking');
});
Route::middleware('auth:api')->group(function () {
 
    Route::post('/products', [ApiProductController::class, 'store']);
    Route::get('/products/{product}', [ApiProductController::class, 'show']);
    Route::put('/products/{product}', [ApiProductController::class, 'update']);
    Route::delete('/products/{product}', [ApiProductController::class, 'destroy']);
});

Route::prefix('shopify')->middleware('auth:api')->group(function () {
    Route::get('/install/{shop}', ShopifyController::class)->name('shopify.install');
    Route::get('/callback', [ShopifyController::class, 'callback'])->name('shopify.callback');

    Route::group(['prefix' => 'webhooks'], function () {
        Route::group(['prefix' => 'products'], function () {
            Route::apiResource('/', ShopifyWebhookProductController::class)->only(['store', 'update', 'destroy']);
        });
    });

});


