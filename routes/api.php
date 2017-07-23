<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth'])->prefix('cars')->group(function () {
    Route::get('/', 'Api\CarController@index')->name('api.car.index');

    Route::get('{id}', 'Api\CarController@show')->name('api.car.show');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('cars', 'Api\Admin\CarController',
        [
            'except' => [
                'create', 'edit',
            ],
            'names' => [
                'index' => 'api.admin.cars.index',
                'store' => 'api.admin.cars.store',
                'show' => 'api.admin.cars.show',
                'update' => 'api.admin.cars.update',
                'destroy' => 'api.admin.cars.destroy',
            ]
        ]);
});
