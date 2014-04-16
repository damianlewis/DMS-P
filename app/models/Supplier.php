<?php

class Supplier extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        'name'          => 'required',
        'address1'      => 'required',
        'city'          => 'required',
        'region'        => 'required',
        'post_code'     => 'required',
        'country'       =>' required',
        'description'   => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'address1', 'address2', 'city', 'region', 'post_code', 'country', 'description'];

    public $errors;

    // Each supplier HAS many vehicles
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