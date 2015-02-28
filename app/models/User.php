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

	//validation rules
	protected $rules = array(
		'email'=>'required|email|exists:users',
		'password'=>'required');
	
	public $errors = array();

	//validate form data
	public function validate($data)
	{
		$v = Validator::make($data,$this->rules);
		if($v->fails())
		{
			$this->errors = $v->messages();
			return false;
		}
		return true;
	}

	//form data validation errors
	public function errors()
	{
		return $this->errors;
	}

	//login attempt
	public function loginAttempt($data)
	{
	 	return Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]);
	}


}
