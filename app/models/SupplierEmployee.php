<?php

class SupplierEmployee extends \Eloquent {

    protected $table = 'supplier_employees';

    // Add your validation rules here
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_number' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['employee_role_id', 'supplier_id', 'honorific_id', 'first_name', 'last_name', 'phone_number'];

    public $errors;

    // Each supplier employee belongs to a single honorific
    public function honorific()
    {
        return $this->belongsTo('Honorific');
    }

    // Each supplier employee belongs to a single employee role
    public function employeeRole()
    {
        return $this->belongsTo('EmployeeRole');
    }

    // Each supplier employee belongs to a single supplier
    public function supplier()
    {
        return $this->belongsTo('Supplier');
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