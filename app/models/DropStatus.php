<?php

class DropStatus extends \Eloquent {

    protected $table = 'drop_statuses';

	protected $fillable = [];

    // Each drop status HAS many drops
    public function drops()
    {
        return $this->hasMany('Drop');
    }
}