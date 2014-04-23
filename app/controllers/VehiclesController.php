<?php

class VehiclesController extends \BaseController {

    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        
        $this->beforeFilter('auth.admin');
    }

    /**
     * Display a listing of vehicles
     *
     * @return Response
     */
    public function index()
    {
        $vehicles = $this->vehicle->all();

        return View::make('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new vehicle
     *
     * @return Response
     */
    public function create()
    {
        return View::make('vehicles.create')
            ->with('suppliers', Supplier::lists('name', 'id'))
            ->with('vehicleMakes', VehicleMake::lists('make', 'id'));
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->vehicle->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->vehicle->errors);
        }

        $this->vehicle->save();

        return Redirect::route('vehicles.index');
    }

    /**
     * Display the specified supplier.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return View::make('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);

        return View::make('vehicles.edit', compact('vehicle'))
            ->with('suppliers', Supplier::lists('name', 'id'))
            ->with('vehicleMakes', VehicleMake::lists('make', 'id'))
            ->with('vehicleModels', VehicleModel::lists('model', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Vehicle::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $vehicle->update($data);

        return Redirect::route('vehicles.show', array($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);

        return Redirect::route('vehicles.index');
    }

}