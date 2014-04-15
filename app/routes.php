<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('suppliers', 'SuppliersController');
Route::resource('vehicles', 'VehiclesController');
Route::resource('vehiclemakes', 'VehicleMakesController');
Route::resource('vehiclemodels', 'VehicleModelsController');
Route::resource('vehiclecategories', 'VehicleCategoriesController');

Route::get('suppliers/{suppliers}/vehicles', array('as'=>'suppliers.vehicles', 'uses'=>'SuppliersController@showVehicles'));
Route::get('suppliers/{suppliers}/vehicles/create', array('as'=>'suppliers.vehicles.create', 'uses'=>'SuppliersController@createVehicle'));
Route::post('suppliers/vehicles', array('as'=>'suppliers.vehicles.store', 'uses'=>'SuppliersController@storeVehicle'));
