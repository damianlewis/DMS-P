<?php

class AuthorisationController extends \BaseController {

    public function index()
    {
        $facilities = Facility::all();

        return View::make('authorisation.index', compact('facilities'));
    }

    public function show($id)
    {
        $deliveries = Delivery::where('delivery_status_id', '<', '3')->get();

        foreach($deliveries as $delivery)
        {
            $delivery->updateExpired();
        }

        $facility = Facility::findOrFail($id);

        return View::make('authorisation.show', compact('facility'));
    }

    public function drop($id)
    {
        $drop = Drop::findOrFail($id);

        // $drop->delivery->updateExpired();

        return View::make('authorisation.drop', compact('drop'));
    }

    public function authoriseEntry($id)
    {
        $drop = Drop::findOrFail($id);

        $drop->drop_status_id = 2;

        $drop->save();

        if ($drop->delivery->delivery_status_id == 1)
        {
            $drop->delivery->delivery_status_id = 2;
            $drop->delivery->save();
        }


        $facility = Facility::findOrFail($drop->facility->id);

        return View::make('authorisation.show', compact('facility'));
    }

    public function authoriseExit($id)
    {
        $drop = Drop::findOrFail($id);

        $drop->drop_status_id = 3;

        $drop->save();

        foreach($drop->delivery->drops as $deliveryDrop)
        {
            if ($deliveryDrop->drop_status_id != 3)
            {
                $facility = Facility::findOrFail($drop->facility->id);

                return View::make('authorisation.show', compact('facility'));
            }
        }

        $drop->delivery->delivery_status_id = 3;
        $drop->delivery->save();

        $facility = Facility::findOrFail($drop->facility->id);

        return View::make('authorisation.show', compact('facility'));
    }
}