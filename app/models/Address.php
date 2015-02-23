<?php

class Address extends Eloquent
{	
	//validation rules
	public $rules = array(
		'city'=>'required|min:2|max:50|alpha',
		'street'=>'required|min:2|max:100',
		'post_code'=>'required|max:15',
		'country'=>'required|min:2|alpha');

	//relation to order
	public function order()
    {
        return $this->belongsTo('Order');
    }
}