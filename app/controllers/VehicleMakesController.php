<?php

class VehicleMakesController extends \BaseController {

    protected $vehicleMake;

    public function __construct(VehicleMake $vehicleMake)
    {
        $this->vehicleMake = $vehicleMake;
        
        $this->beforeFilter('auth.admin');
    }

    /**
     * Display a listing of vehiclemakes
     *
     * @return Response
     */
    public function index()
    {
        $vehiclemakes = $this->vehicleMake->all();

        return View::make('vehiclemakes.index', compact('vehiclemakes'));
    }

    /**
     * Show the form for creating a new vehiclemake
     *
     * @return Response
     */
    public function create()
    {
        return View::make('vehiclemakes.create');
    }

    /**
     * Store a newly created vehiclemake in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->vehicleMake->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->vehicleMake->errors);
        }

        $this->vehicleMake->save();

        return Redirect::route('vehiclemakes.index');
    }

    /**
     * Show the form for editing the specified vehiclemake.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $vehiclemake = VehicleMake::find($id);

        return View::make('vehiclemakes.edit', compact('vehiclemake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $vehiclemake = VehicleMake::findOrFail($id);

        $validator = Validator::make($data = Input::all(), VehicleMake::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $vehiclemake->update($data);

        return Redirect::route('vehiclemakes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        VehicleMake::destroy($id);

        return Redirect::route('vehiclemakes.index');
    }

}