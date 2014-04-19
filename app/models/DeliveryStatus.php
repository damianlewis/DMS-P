<?php

class DeliveryStatus extends \Eloquent {
    
    protected $table = 'delivery_statuses';

	protected $fillable = [];

    // Each delivery status HAS many deliveries
    public function deliveries()
    {
        return $this->hasMany('Delivery');
    }
}