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

Route::get('authorisation', array('as'=>'authorisation.index', 'uses'=>'AuthorisationController@index'));
Route::get('authorisation/{facility}', array('as'=>'authorisation.show', 'uses'=>'AuthorisationController@show'));
Route::get('authorisation/drop/{drop}', array('as'=>'authorisation.drop', 'uses'=>'AuthorisationController@drop'));
Route::get('authorisation/entry/{drop}', array('as'=>'authorisation.entry', 'uses'=>'AuthorisationController@authoriseEntry'));
Route::get('authorisation/exit/{drop}', array('as'=>'authorisation.exit', 'uses'=>'AuthorisationController@authoriseExit'));

//Route::get('suppliers/{suppliers}/vehicles', array('as'=>'suppliers.vehicles', 'uses'=>'SuppliersController@showVehicles'));
//Route::get('suppliers/{suppliers}/vehicles/create', array('as'=>'suppliers.vehicles.create', 'uses'=>'SuppliersController@createVehicle'));
//Route::post('suppliers/vehicles', array('as'=>'suppliers.vehicles.store', 'uses'=>'SuppliersController@storeVehicle'));
Route::get('api/dropdown', function()
{
    $input = Input::get('option');
    $maker = VehicleMake::find($input);
    $models = $maker->vehicleModels;

    return $models;
});