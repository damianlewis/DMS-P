<?php

class VehicleModel extends \Eloquent {

    protected $table = 'vehicle_models';

    // Add your validation rules here
    public static $rules = [
        'model' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['model', 'vehicle_make_id'];

    public $errors;

    // Each vehicle model HAS many vehicles
    public function vehicles()
    {
        return $this->hasMany('Vehicle');
    }

    // Each vehicle model belongs to a single vehicle make
    public function vehicleMake()
    {
        return $this->belongsTo('VehicleMake');
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