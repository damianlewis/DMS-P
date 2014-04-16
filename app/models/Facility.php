<?php

class Facility extends \Eloquent {

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