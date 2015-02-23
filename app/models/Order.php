<?php

class Order extends Eloquent
{	

	protected $address;

	public function __construct()
	{
		$this->address = new Address;
	}

	//validation rules
	protected $rules = array(
		'name'=>'required|min:2|max:50|alpha',
		'surname'=>'required|min:2|max:50|alpha',
		'email'=>'required|email',
		'phone'=>'required|numeric|min:5',
		'personal_number'=>'required|numeric');

	//validation errors
	public $errors = array();


	//validate form data
	public function validate($data)
	{
		$orderValidator = Validator::make($data,$this->rules);

		$addressValidator = Validator::make($data, $this->address->rules);

		if($orderValidator->fails() || $addressValidator->fails())
		{
			$errors = $orderValidator->errors(); 
			$errors->merge($addressValidator->errors());

			$this->errors = $errors;

			return false;
		}

		return true;
	}

	//form data validation errors
	public function errors()
	{
		return $this->errors;
	}

	//create new order
	public function createOrder($data,$productId)
	{
		$order = new Order;

		$order->name = $data['name'];
		$order->surname = $data['surname'];
		$order->personal_number = $data['personal_number'];
		$order->phone = $data['phone'];
		$order->email = $data['email'];
		$order->product_id = $productId;
		$order->save();

		$address = new Address;
		$address->city = $data['city'];
		$address->street = $data['street'];
		$address->post_code = $data['post_code'];
		$address->country = $data['country'];

		$address->order()->associate($order);
    	$address->save();
		
		return true;
	}

	//relation to addresss
	public function address()
	{
		return $this->hasOne('Address');
	}

	//relation to product
	public function product()
    {
        return $this->belongsTo('Product');
    }

    //realation to status
    public function status()
    {
        return $this->belongsTo('Status');
    }
}