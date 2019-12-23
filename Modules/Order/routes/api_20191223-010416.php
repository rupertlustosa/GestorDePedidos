<?php

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
//auth:api
Route::middleware(['web'])
    ->group(function ($api) {

        $api->resource('order_statuses', 'OrderStatusController')->except([
            'create', 'edit'
        ]);

        $api->resource('order_items', 'OrderItemController')->except([
            'create', 'edit'
        ]);

        $api->resource('orders', 'OrderController')->except([
            'create', 'edit'
        ]);

        $api->resource('order_types', 'OrderTypeController')->except([
            'create', 'edit'
        ]);
    });
