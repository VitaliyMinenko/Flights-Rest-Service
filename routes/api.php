<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('flights','\App\Http\Controllers\FlightsController@getAction');

    Route::post('flights','\App\Http\Controllers\FlightsController@postAction')->middleware('json');

    Route::put('flights/{id}','\App\Http\Controllers\FlightsController@putAction')->middleware('json');

    Route::any('/{path}', function() {
        return response()->json([
            'status'   => 'error',
            'message' => 'Route not found'
        ], Response::HTTP_NOT_FOUND);
    })->where('path', '.*');
});