<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Member extends Eloquent implements UserInterface, RemindableInterface {

    // Add your validation rules here
    // public static $rules = [
    //     'first_name' => 'required',
    //     'last_name' => 'required',
    //     'email' => 'email',
    //     'username' => 'required',
    //     'password' => 'required'
    // ];

    // Don't forget to fill this array
    // protected $fillable = ['member_role_id', 'honorific_id', 'first_name', 'last_name', 'email', 'username', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    // public $errors;

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

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // public function isValid()
    // {
    //      $validation = Validator::make($this->attributes, static::$rules);

    //     if ($validation->passes())
    //     {
    //         return true;
    //     }

    //     $this->errors = $validation->messages();

    //     return false;
    // }
}