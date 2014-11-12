<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected  $fillable =['email', 'password', 'gender', 'accesscode', 'verified'];

    public static $rules = [
        'email' => 'unique:users',
        'password' => 'required',
        'gender' => 'required'
    ];

    public static $errors;

    public static function isValid($data){
        $validation = Validator:: make($data, static::$rules);

        if($validation->passes()){
            return true;
        }

        static:: $errors = $validation->messages();
        return false;
    }

}
