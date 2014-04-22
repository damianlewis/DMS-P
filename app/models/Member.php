<?php

class Member extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'email',
        'username' => 'required',
        'password' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['member_role_id', 'honorific_id', 'first_name', 'last_name', 'email', 'username', 'password'];

    public $errors;

    // Each supplier employee belongs to a single honorific
    public function honorific()
    {
        return $this->belongsTo('Honorific');
    }

    // Each supplier employee belongs to a single employee role
    public function memberRole()
    {
        return $this->belongsTo('MemberRole');
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