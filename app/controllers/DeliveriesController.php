<?php

class DeliveriesController extends \BaseController {

    protected $delivery;

    public function __construct(Delivery $delivery)
    {
        $this->delivery = $delivery;
        
        $this->beforeFilter('auth.admin');
    }

    /**
     * Display a listing of deliveries
     *
     * @return Response
     */
    public function index()
    {
        $currentDeliveries = $this->delivery->where('delivery_status_id', '<', '3')->get();

        foreach($currentDeliveries as $delivery)
        {
            $delivery->updateExpired();
        }

        $deliveries = $this->delivery->all();
        
        return View::make('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new delivery
     *
     * @return Response
     */
    public function create()
    {
        return View::make('deliveries.create')
            ->with('suppliers', Supplier::all())
            ->with('vehicles', Vehicle::all())
            ->with('supplierEmployees', SupplierEmployee::all());
    }

    /**
     * Store a newly created delivery in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->delivery->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->delivery->errors);
        }

        $this->delivery->save();

        $this->delivery->supplierEmployees()->attach(Input::get('employee_id'));
        $this->delivery->vehicles()->attach(Input::get('vehicle_id'));

        return Redirect::route('deliveries.show', array($this->delivery->id));
    }

    /**
     * Display the specified delivery.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $delivery = Delivery::findOrFail($id);

        $delivery->updateExpired();

        return View::make('deliveries.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified delivery.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $delivery = Delivery::find($id);

        return View::make('deliveries.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $delivery = Delivery::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Delivery::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $delivery->update($data);

        return Redirect::route('deliveries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Delivery::destroy($id);

        return Redirect::route('deliveries.index');
    }

    public function cancel($id)
    {
        $delivery = Delivery::findOrFail($id);

        $delivery->delivery_status_id = 4;
        $delivery->save();

        foreach($delivery->drops as $drop)
        {
            $drop->drop_status_id = 4;
            $drop->save();
        }

        return Redirect::route('deliveries.index');

    }

}