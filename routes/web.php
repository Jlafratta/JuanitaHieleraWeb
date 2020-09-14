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
    return redirect('admin/tickets/create');
});



Auth::routes();


Route::get('/admin/create','Admin\TicketController@create')->name('home');






Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/tickets', 'TicketController', ['except' => ['edit', 'update', 'show', 'destroy']]);
    Route::get('/sales', 'TicketController@sales')->name('sales');

    Route::resource('/clients', 'ClientController', ['except' => ['create']]);
    Route::resource('/products', 'ProductController', ['except' => ['create']]);
    Route::resource('/vehicles', 'VehicleController', ['except' => ['create']]);
    Route::resource('/users', 'UserController', ['except' => ['create']]);

       // ruta para actualizar select
    Route::get('/clients/vehicles/{id}','VehicleController@byClientId')->name('byClientId');
    Route::get('/vehicles/{id}','VehicleController@byVehicleId')->name('byVehicleId');

   // Route::get('/provinces/{id}','ClientController@localityByProvinceId')->name('LocalityByProvince');


});





/*
|--------------------------------------------------------------------------
| Web Titles
|--------------------------------------------------------------------------
|
|
*/

/* DASH Titles */

define('NEW_TICKET_TITLE', 'JH | Nuevo ingreso');
define('TICKETS_TITLE', 'JH | Tickets');
define('CLIENTS_TITLE', 'JH | Clientes');
define('VEHICLES_TITLE', 'JH | Vehiculos');
define('PRODUCTS_TITLE', 'JH | Productos');
define('DAILY_SALES_TITLE', 'JH | Ventas del dia');

/* ENTRY Titles */

define('LOGIN_TITLE', 'JH | Iniciar sesion');
define('REGISTER_TITLE', 'JH | Registro');
define('USERS_TITLE', 'JH | Empleados');
