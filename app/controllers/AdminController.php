<?php 

class AdminController extends BaseController
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	//get login page
	public function getLogin()
	{
		return View::make('pages.login');
	}

	//process login data
	public function postLogin()
	{
		if($this->user->validate(Input::all()) === true)
		{
			if($this->user->loginAttempt(Input::all()) === true)
			{
				return Redirect::route('home.index.get')->with('global',['class'=>'alert alert-success','message'=>'Sveiki prisijungę !']);
			}
			else
			{
				return Redirect::route('home.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Nepavyko prisijungti, bandyti vėliau.']);
			}
		}

		return Redirect::route('admin.login.get')->withErrors($this->user->errors)->withInput();
	}

	//logout user
	public function getLogout()
	{
		Auth::logout();

		return Redirect::route('home.index.get');
	}
}