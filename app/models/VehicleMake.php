<?php

class VehicleMake extends \Eloquent {

    protected $table = 'vehicle_makes';

    // Add your validation rules here
    public static $rules = [
        'make' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['make'];

    public $errors;

    // Each vehicle make HAS many vehicle models
    public function vehicleModels()
    {
        return $this->hasMany('VehicleModel');
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