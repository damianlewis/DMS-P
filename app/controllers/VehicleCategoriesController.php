<?php

class VehicleCategoriesController extends \BaseController {

    protected $vehicleCategory;

    public function __construct(VehicleCategory $vehicleCategory)
    {
        $this->vehicleCategory = $vehicleCategory;
    }

    /**
     * Display a listing of vehiclecategories
     *
     * @return Response
     */
    public function index()
    {
        $vehiclecategories = $this->vehicleCategory->all();

        return View::make('vehiclecategories.index', compact('vehiclecategories'));
    }

    /**
     * Show the form for creating a new vehiclecategory
     *
     * @return Response
     */
    public function create()
    {
        return View::make('vehiclecategories.create');
    }

    /**
     * Store a newly created vehiclecategory in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->vehicleCategory->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->vehicleCategory->errors);
        }

        $this->vehicleCategory->save();

        return Redirect::route('vehiclecategories.index');
    }

    /**
     * Show the form for editing the specified vehiclecategory.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $vehiclecategory = VehicleCategory::find($id);

        return View::make('vehiclecategories.edit', compact('vehiclecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $vehiclecategory = VehicleCategory::findOrFail($id);

        $validator = Validator::make($data = Input::all(), VehicleCategory::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $vehiclecategory->update($data);

        return Redirect::route('vehiclecategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        VehicleCategory::destroy($id);

        return Redirect::route('vehiclecategories.index');
    }

}