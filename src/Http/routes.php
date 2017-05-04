<?php

Route::group([
    'middleware' => 'web'], function () {
        Route::group(['middleware' => 'auth'], function () {
//            Route::group(['middleware' => 'can:browse attendances'], function () {
//                Route::resource('attendances', 'AttendancesController');
//            });
            Route::resource('lessons', 'LessonsController');
        });
    });
Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'api',
], function () {
    //Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::resource('lessons', 'LessonsController');
    });
});

        //:end-routes: