<?php

class TimeSlot extends \Eloquent {

    protected $table = 'time_slots';

	protected $fillable = [];

    // // Each time slot HAS many drops
    // public function drops()
    // {
    //     return $this->hasMany('Drop');
    // }

    // Each time slot belongs to a many deliveries
    // public function deliveries()
    // {
    //     return $this->belongsToMany('Delivery', 'deliveries_time_slots', 'facility_id', 'time_slot_id');
    // }
}