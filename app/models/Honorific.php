<?php

class Honorific extends \Eloquent {
	protected $fillable = [];

    // Each honorific HAS many supplier employees
    public function supplierEmployees()
    {
        return $this->hasMany('SupplierEmployee');
    }
}