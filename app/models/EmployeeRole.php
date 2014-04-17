<?php

class EmployeeRole extends \Eloquent {

    protected $table = 'employee_roles';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['role', 'description'];

    // Each employee role HAS many supplier employees
    public function supplierEmployees()
    {
        return $this->hasMany('SupplierEmployee');
    }
}