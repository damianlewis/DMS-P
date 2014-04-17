<?php

class SupplierEmployeesController extends \BaseController {

    protected $supplierEmployee;

    public function __construct(SupplierEmployee $supplierEmployee)
    {
        $this->supplierEmployee = $supplierEmployee;
    }

    /**
     * Display a listing of supplieremployees
     *
     * @return Response
     */
    public function index()
    {
        $supplierEmployees = $this->supplierEmployee->all();

        return View::make('supplieremployees.index', compact('supplierEmployees'));
    }

    /**
     * Show the form for creating a new supplieremployee
     *
     * @return Response
     */
    public function create()
    {
        return View::make('supplieremployees.create')
            ->with('suppliers', Supplier::lists('name', 'id'))
            ->with('honorifics', Honorific::lists('honorific', 'id'))
            ->with('roles', EmployeeRole::lists('role', 'id'));
    }

    /**
     * Store a newly created supplieremployee in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->supplierEmployee->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->supplierEmployee->errors);
        }

        $this->supplierEmployee->save();

        return Redirect::route('supplieremployees.index');
    }

    /**
     * Display the specified supplieremployee.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $supplierEmployee = SupplierEmployee::findOrFail($id);

        return View::make('supplieremployees.show', compact('supplierEmployee'));
    }

    /**
     * Show the form for editing the specified supplieremployee.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $supplierEmployee = SupplierEmployee::find($id);

        return View::make('supplieremployees.edit', compact('supplierEmployee'))
            ->with('suppliers', Supplier::lists('name', 'id'))
            ->with('honorifics', Honorific::lists('honorific', 'id'))
            ->with('roles', EmployeeRole::lists('role', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $supplierEmployee = SupplierEmployee::findOrFail($id);

        $validator = Validator::make($data = Input::all(), SupplierEmployee::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $supplierEmployee->update($data);

        return Redirect::route('supplieremployees.show', array($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        SupplierEmployee::destroy($id);

        return Redirect::route('supplieremployees.index');
    }

}