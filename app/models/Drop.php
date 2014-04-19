<?php

class Drop extends \Eloquent {

    // Add your validation rules here
    public static $rules = [];

    // Don't forget to fill this array
    protected $fillable = ['delivery_id', 'facility_id', 'time_slot', 'drop_status_id'];

    // Each drop belongs to a single delivery
    public function delivery()
    {
        return $this->belongsTo('Delivery');
    }

    // // Each drop belongs to a single time slot
    // public function timeSlot()
    // {
    //     return $this->belongsTo('TimeSlot');
    // }

    // Each drop belongs to a single Facility
    public function facility()
    {
        return $this->belongsTo('Facility');
    }

    // Each drop belongs to a single drop status
    public function dropStatus()
    {
        return $this->belongsTo('DropStatus');
    }

    // // Each delivery belongs to a many facilities
    // public function facilities()
    // {
    //     return $this->belongsToMany('Facility', 'deliveries_facilities', 'delivery_id', 'facility_id');
    // }

    // // Each delivery belongs to a many time slots
    // public function timeSlots()
    // {
    //     return $this->belongsToMany('TimeSlot', 'deliveries_time_slots', 'delivery_id', 'time_slot_id');
    // }

    public function isValid()
    {
        $validation = Validator::make($this->attributes, static::$rules);

        if ($validation->passes())
        {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }
}