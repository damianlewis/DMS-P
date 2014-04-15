<?php

class VehicleCategory extends \Eloquent {

    protected $table = 'vehicle_categories';

    // Add your validation rules here
    public static $rules = [
        'category' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['category'];

    public $errors;

    // Each vehicle category HAS many vehicles
    public function vehicles()
    {
        return $this->hasMany('Vehicle');
    }

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