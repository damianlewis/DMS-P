<?php

class MemberRole extends \Eloquent {
    
    protected $table = 'member_roles';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['role', 'description'];

    // Each member role HAS many members
    public function members()
    {
        return $this->hasMany('Member');
    }
}