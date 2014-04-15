<?php

class SuppliersController extends \BaseController {

    protected $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Display a listing of suppliers
     *
     * @return Response
     */
    public function index()
    {
        $suppliers = $this->supplier->all();

        return View::make('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new supplier
     *
     * @return Response
     */
    public function create()
    {
        return View::make('suppliers.create');
    }

    /**
     * Store a newly created supplier in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->supplier->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->supplier->errors);
        }

        $this->supplier->save();

        return Redirect::route('suppliers.index');
    }

    /**
     * Display the specified supplier.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);

        //dd($supplier->vehicles);

        return View::make('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified supplier.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return View::make('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $supplier = Supplier::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Supplier::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $supplier->update($data);

        return Redirect::route('suppliers.show', array($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);

        return Redirect::route('suppliers.index');
    }

    public function showVehicles($id)
    {
        $supplier = Supplier::findOrFail($id);

        //dd($supplier->vehicles);

        return View::make('suppliers.vehicles', compact('supplier'));
    }

    public function createVehicle($id)
    {
        $supplier = Supplier::findOrFail($id);

        //dd($supplier->vehicles);

        return View::make('suppliers.create_vehicle', compact('supplier'))
            ->with('vehicleModels', VehicleModel::lists('model', 'id'))
            ->with('vehicleCategories', VehicleCategory::lists('category', 'id'));
    }

    public function storeVehicle()
    {
        $validator = Validator::make($data = Input::all(), Vehicle::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Vehicle::create($data);

        $supplier = Supplier::findOrFail(Input::get('supplier_id'));

        return View::make('suppliers.vehicles', compact('supplier'));
    }
}