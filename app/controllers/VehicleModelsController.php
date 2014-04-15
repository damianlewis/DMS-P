<?php

class VehicleModelsController extends \BaseController {

    protected $vehicleModel;

    public function __construct(VehicleModel $vehicleModel)
    {
        $this->vehicleModel = $vehicleModel;
    }

    /**
     * Display a listing of vehiclemodels
     *
     * @return Response
     */
    public function index()
    {
        $vehiclemodels = $this->vehicleModel->all();

        return View::make('vehiclemodels.index', compact('vehiclemodels'));
    }

    /**
     * Show the form for creating a new vehiclemodel
     *
     * @return Response
     */
    public function create()
    {
        return View::make('vehiclemodels.create')->with('vehicleMakes', VehicleMake::lists('make', 'id'));
    }

    /**
     * Store a newly created vehiclemodel in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->vehicleModel->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->vehicleModel->errors);
        }

        $this->vehicleModel->save();

        return Redirect::route('vehiclemodels.index');
    }

    /**
     * Show the form for editing the specified vehiclemodel.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $vehiclemodel = VehicleModel::find($id);

        return View::make('vehiclemodels.edit', compact('vehiclemodel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $vehiclemodel = VehicleModel::findOrFail($id);

        $validator = Validator::make($data = Input::all(), VehicleModel::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $vehiclemodel->update($data);

        return Redirect::route('vehiclemodels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        VehicleModel::destroy($id);

        return Redirect::route('vehiclemodels.index');
    }

}