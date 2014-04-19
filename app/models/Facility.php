<?php

class Facility extends \Eloquent {

    protected $table = 'facilities';

    // Add your validation rules here
    public static $rules = [
        'name'         => 'required',
        'address1'     => 'required',
        'city'         => 'required',
        'county'       => 'required',
        'post_code'    => 'required',
        'capacity'     => 'required',
        'description'  => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'address1', 'address2', 'city', 'county', 'post_code', 'latitude', 'longitude', 'capacity', 'description'];

    public $errors;

    // Each facility HAS many drops
    public function drops()
    {
        return $this->hasMany('Drop');
    }

    // // Each facility belongs to a many deliveries
    // public function deliveries()
    // {
    //     return $this->belongsToMany('Delivery', 'deliveries_facilities', 'delivery_id', 'facility_id');
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