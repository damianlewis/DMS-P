<?php

class FacilitiesController extends \BaseController {

    protected $facility;

    public function __construct(Facility $facility)
    {
        $this->facility = $facility;

        $this->beforeFilter('auth.admin');
    }

    /**
     * Display a listing of facilities
     *
     * @return Response
     */
    public function index()
    {
        $facilities = $this->facility->all();

        return View::make('facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new facility
     *
     * @return Response
     */
    public function create()
    {
        return View::make('facilities.create');
    }

    /**
     * Store a newly created facility in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->facility->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->facility->errors);
        }

        $this->facility->save();

        return Redirect::route('facilities.index');
    }

    /**
     * Display the specified facility.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $facility = Facility::findOrFail($id);

        return View::make('facilities.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified facility.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $facility = Facility::find($id);

        return View::make('facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $facility = Facility::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Facility::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $facility->update($data);

        return Redirect::route('facilities.show', array($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Facility::destroy($id);

        return Redirect::route('facilities.index');
    }

}