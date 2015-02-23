<?php 

Class Product extends Eloquent
{
	//validation rules
	protected $rules = array(
		'title'=>'required|max:150',
		'price_eu'=>'required|integer|digits_between:1,10|min:0',
		'price_ct'=>'required|integer|digits_between:1,2|min:0|max:99',
		'description'=>'required|max:600',
		'photo'=>'required|image|max:1024');
	
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

	//create new product
	public function createProduct($data)
	{
		$this->sku = uniqid();
		$this->title = $data['title'];
		$this->price_eu = $data['price_eu'];
		$this->price_ct = $data['price_ct'];
		$this->description = $data['description'];

		if (Input::hasFile('photo'))
		{
			mkdir(public_path()."\img\products".'\\'.$this->sku);

			$path = public_path()."\img\products\\".$this->sku;

			$randName = $this->sku.'-'.Input::file('photo')->getClientOriginalName();

			Input::file('photo')->move($path, $randName);

			$this->photo = $randName;
		}
		else
		{
			$this->photo = '';
		}

		$this->save();

		return true;
	}

	//Edit product
	public function editProduct($product,$data)
	{
		if(Input::hasFile('photo'))
		{
			$directory = public_path().'/img/products/'.$product->sku;

			if(File::exists($directory))
			{
				File::deleteDirectory($directory);
			}

			mkdir(public_path()."\img\products".'\\'.$product->sku);

			$path = public_path()."\img\products\\".$product->sku;

			$randName = $product->sku.'-'.Input::file('photo')->getClientOriginalName();

			Input::file('photo')->move($path, $randName);

			$product->photo = $randName;
		}
		
		$product->title = $data['title'];
		$product->price_eu = $data['price_eu'];
		$product->price_ct = $data['price_ct'];
		$product->description = $data['description'];
		$product->save();

		return true;
	}

	//delete product
	public function deleteProduct($product)
	{
		$directory = public_path().'/img/products/'.$product->sku;

		if(File::exists($directory))
		{
			File::deleteDirectory($directory);
		}
		
		$product->delete();

		return true;
	}

	//format cents
	public function getCents()
	{
		return (mb_strlen($this->price_ct) == 1) ? '0'.$this->price_ct : $this->price_ct;
	}
}