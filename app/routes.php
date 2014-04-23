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

// Admin
Route::resource('facilities', 'FacilitiesController');
Route::resource('suppliers', 'SuppliersController');
Route::resource('vehicles', 'VehiclesController');
Route::resource('vehiclemakes', 'VehicleMakesController');
Route::resource('vehiclemodels', 'VehicleModelsController');
//Route::resource('vehiclecategories', 'VehicleCategoriesController');
Route::resource('supplieremployees', 'SupplierEmployeesController');

// Deliveries
Route::resource('deliveries', 'DeliveriesController');
Route::resource('drops', 'DropsController');
Route::get('deliveries/{deliveries}/drops/create', array('as'=>'drops.add', 'uses'=>'DropsController@add'));
Route::get('deliveries/{deliveries}/cancel', array('as'=>'deliveries.cancel', 'uses'=>'DeliveriesController@cancel'));
Route::get('drops/{drops}/cancel', array('as'=>'drops.cancel', 'uses'=>'DropsController@cancel'));

// Receptionist / Authorisation
Route::get('authorisation', array('as'=>'authorisation.index', 'uses'=>'AuthorisationController@index'));
Route::get('authorisation/{facility}', array('as'=>'authorisation.show', 'uses'=>'AuthorisationController@show'));
Route::get('authorisation/drop/{drop}', array('as'=>'authorisation.drop', 'uses'=>'AuthorisationController@drop'));
Route::get('authorisation/entry/{drop}', array('as'=>'authorisation.entry', 'uses'=>'AuthorisationController@authoriseEntry'));
Route::get('authorisation/exit/{drop}', array('as'=>'authorisation.exit', 'uses'=>'AuthorisationController@authoriseExit'));

// Login / Sessions Management
Route::resource('sessions', 'SessionsController');
Route::get('login', array('as'=>'login', 'uses'=>'SessionsController@create'));
Route::get('logout', array('as'=>'logout', 'uses'=>'SessionsController@destroy'));
Route::get('error', array('as'=>'permission', 'uses'=>'SessionsController@permission'));
Route::get('/', array('as'=>'home', 'uses'=>'HomeController@index'));

// API
Route::get('api/dropdown', function()
{
    $input = Input::get('option');
    $maker = VehicleMake::find($input);
    $models = $maker->vehicleModels;

    return $models;
});

Route::get('api/dropdown/vehicles', function()
{
    $input = Input::get('option');
    $supplier = Supplier::find($input);
    $vehicles = $supplier->vehicles;

    return $vehicles;
});

Route::get('api/dropdown/employees', function()
{
    $input = Input::get('option');
    $supplier = Supplier::find($input);
    $employees = $supplier->supplierEmployees;

    return $employees;
});