<?php

class DropsController extends \BaseController {

    protected $drop;

    public function __construct(Drop $drop)
    {
        $this->drop = $drop;
        
        $this->beforeFilter('auth.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function add($id)
    {
        //$delivery = Delivery::find($id);

        return View::make('drops.create')
            ->with('delivery', Delivery::find($id))
            ->with('facilities', Facility::all());
            // ->with('timeSlots', TimeSlot::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (!$this->drop->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->drop->errors);
        }

        $this->drop->save();

        return Redirect::route('deliveries.show', array(Input::get('delivery_id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $drop = Drop::findOrFail($id);

        return View::make('drops.show', compact('drop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // $delivery = Delivery::find($id);

        // return View::make('drops.edit', compact('delivery'))
        //     ->with('facilities', Facility::all())
        //     ->with('timeSlots', TimeSlot::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return 'delete'.$id;
    }

    public function cancel($id)
    {
        $drop = Drop::findOrFail($id);

        $drop->drop_status_id = 4;
        $drop->save();

        return Redirect::route('deliveries.show', array($drop->delivery->id));

    }

}