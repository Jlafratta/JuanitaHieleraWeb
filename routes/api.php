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

Route::namespace('API')->group(function(){

    Route::get('clients', 'ClientRestController@index');
    Route::get('vehicles', 'VehicleRestController@index');
    Route::get('products', 'ProductRestController@index');
    Route::get('tickets', 'TicketRestController@index');
    Route::post('ticket', 'TicketRestController@store');
    Route::post('tickets', 'TicketRestController@addAll');

});

