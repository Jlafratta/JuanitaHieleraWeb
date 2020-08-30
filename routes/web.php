<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/tickets', 'TicketController', ['except' => ['edit', 'update']]);
         Route::get('/sales', 'TicketController@sales')->name('sales');
    Route::resource('/clients', 'ClientController');
    Route::resource('/products', 'ProductController');
    Route::resource('/vehicles', 'VehicleController');
});



/*
|--------------------------------------------------------------------------
| Web Titles
|--------------------------------------------------------------------------
|
|
*/

define('NEW_TICKET_TITLE', 'JH | Nuevo ingreso');
define('TICKETS_TITLE', 'JH | Tickets');
define('CLIENTS_TITLE', 'JH | Clientes');
define('VEHICLES_TITLE', 'JH | Vehiculos');
define('PRODUCTS_TITLE', 'JH | Productos');
define('DAILY_SALES_TITLE', 'JH | Ventas del dia');