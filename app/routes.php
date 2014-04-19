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
Route::resource('facilities', 'FacilitiesController');
Route::resource('suppliers', 'SuppliersController');
Route::resource('vehicles', 'VehiclesController');
Route::resource('vehiclemakes', 'VehicleMakesController');
Route::resource('vehiclemodels', 'VehicleModelsController');
//Route::resource('vehiclecategories', 'VehicleCategoriesController');
Route::resource('supplieremployees', 'SupplierEmployeesController');

Route::resource('deliveries', 'DeliveriesController');
Route::resource('drops', 'DropsController');
Route::get('deliveries/{deliveries}/drops/create', array('as'=>'drops.add', 'uses'=>'DropsController@add'));
Route::get('deliveries/{deliveries}/cancel', array('as'=>'deliveries.cancel', 'uses'=>'DeliveriesController@cancel'));
//Route::get('suppliers/{suppliers}/vehicles', array('as'=>'suppliers.vehicles', 'uses'=>'SuppliersController@showVehicles'));
//Route::get('suppliers/{suppliers}/vehicles/create', array('as'=>'suppliers.vehicles.create', 'uses'=>'SuppliersController@createVehicle'));
//Route::post('suppliers/vehicles', array('as'=>'suppliers.vehicles.store', 'uses'=>'SuppliersController@storeVehicle'));
Route::get('api/dropdown', function()
{
    $input = Input::get('option');
    $maker = VehicleMake::find($input);
    $models = $maker->vehicleModels;

    //return Response::eloquent($models->lists('id','model'));
    //return Response::json(array($models->get(array('id','name')));

    return $models;
});