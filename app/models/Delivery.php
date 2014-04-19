<?php

class Delivery extends \Eloquent {

    protected $table = 'deliveries';

    // Add your validation rules here
    public static $rules = [
        'date' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['delivery_status_id', 'date', 'note'];

    // Each delivery HAS many drops
    public function drops()
    {
        return $this->hasMany('Drop');
    }

    // Each delivery belongs to a single delivery status
    public function deliveryStatus()
    {
        return $this->belongsTo('DeliveryStatus');
    }

    // Each delivery belongs to a many supplier employees
    public function supplierEmployees()
    {
        return $this->belongsToMany('SupplierEmployee', 'deliveries_employees', 'delivery_id', 'employee_id');
    }

    // Each delivery belongs to a many vehicles
    public function vehicles()
    {
        return $this->belongsToMany('Vehicle', 'deliveries_vehicles', 'delivery_id', 'vehicle_id');
    }

    public function updateExpired()
    {
        //$deliveries = $this->delivery->where('delivery_status_id', '<', '3')->get();

        //if($this->delivery_status_id < 3)
        //foreach($deliveries as $delivery)
        //{
            if (strtotime('- 1 day') > strtotime($this->date))
            {
                $this->delivery_status_id = 5;
                $this->save();

                foreach($this->drops as $drop)
                {
                    if ($drop->drop_status_id < 3)
                    {
                        $drop->drop_status_id = 5;
                        $drop->save();
                    }
                }
            }
        //}
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