<?php

class HomeController extends BaseController 
{
	public function getIndex()
	{
		return View::make('pages.home')->with(['products'=>Product::paginate(12)]);
	}
}
