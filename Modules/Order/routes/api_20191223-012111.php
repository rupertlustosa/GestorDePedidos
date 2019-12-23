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

        $api->apiResources([
            'order_statuses' => 'OrderStatusController',
            'order_items' => 'OrderItemController',
            'order_types' => 'OrderTypeController',
            'order_points' => 'OrderPointController',
            'orders' => 'OrderController',
        ]);
    });
