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

        $api->get('order_types/list-of-choices', 'OrderTypeController@listOfChoices');
        $api->get('order_points/list-of-choices', 'OrderPointController@listOfChoices');
        $api->apiResources([
            'order_statuses' => 'OrderStatusController',
            'order_items' => 'OrderItemController',
            'order_types' => 'OrderTypeController',
            'order_points' => 'OrderPointController',
            'orders' => 'OrderController',
        ]);
    });
