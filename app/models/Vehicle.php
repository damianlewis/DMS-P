<?php

class Vehicle extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        'registration_number' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['supplier_id', 'vehicle_model_id', 'vehicle_category_id', 'registration_number'];

    public $errors;

    // Each vehicle belongs to a single supplier
    public function supplier()
    {
        return $this->belongsTo('Supplier');
    }

    // Each vehicle belongs to a single vehicle model
    public function vehicleModel()
    {
        return $this->belongsTo('VehicleModel');
    }

    // Each vehicle belongs to a single vehicle category
    public function vehicleCategory()
    {
        return $this->belongsTo('VehicleCategory');
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