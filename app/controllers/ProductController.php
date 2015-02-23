<?php

class ProductController extends BaseController
{

	protected $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	} 


	//User side pages

	/*==========================Get single product for user==========================*/
	public function getSingle($id)
	{
		return View::make('pages.single')->with('product',Product::findOrFail($id));
	}





	//Admin side pages

	/*==========================Get all products in admin page==========================*/
	public function getIndex()
	{
		return View::make('pages.admin.product.home')->with('products',$this->product->paginate(5));
	}


	/*==========================Get single product for admin==========================*/
	public function getSingleAdmin($id)
	{
		return View::make('pages.admin.product.single')->with('product',Product::findOrFail($id));
	}


	/*==========================Get create new product page for admin==========================*/
	public function getCreate()
	{
		return View::make('pages.admin.product.create');
	}


	/*==========================Create new product for admin==========================*/
	public function postCreate()
	{
		if($this->product->validate(Input::all()) === true)
		{
			if($this->product->createProduct(Input::all()) === true)
			{
				return Redirect::route('product.index.get')->with('global',['class'=>'alert alert-success','message'=>'Prekė sukurta sėkmingai.']);
			}
			else
			{
				return Redirect::route('product.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Nepavyko sukurti prekės, bandyti vėliau.']);
			}
		}

		return Redirect::route('product.create.get')->withErrors($this->product->errors)->withInput();
	}


	/*==========================Get edit product page for admin==========================*/
	public function getEdit($id)
	{
		return View::make('pages.admin.product.edit')->with('product', $this->product->find($id));
	}


	/*==========================Edit product for admin==========================*/
	public function postEdit($id)
	{
		$product = $this->product->find($id);


		if($product->count())
		{
			if($this->product->validate(Input::all()))
			{
				if($this->product->editProduct($product,Input::all()) === true)
				{
					return Redirect::route('product.index.get')->with('global',['class'=>'alert alert-success','message'=>'Produktas atnaujintas']);
				}
				else
				{
					return Redirect::route('product.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Klaida atnaujinant produktą.']);
				}
			}
			else
			{

				return Redirect::route('product.edit.get',['id'=>$product->id])->withErrors($this->product->errors)->withInput();
			}
		}
		return App::abort(404);
	}


	/*==========================Delete product for admin==========================*/
	public function postDestroy($id)
	{
		$product = $this->product->find($id);

		if($product->count())
		{
			if($this->product->deleteProduct($product) === true)
			{
				return Redirect::route('product.index.get')->with('global',['class'=>'alert alert-success','message'=>'Produktas pašalintas.']);
			}
			else
			{
				return Redirect::route('product.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Klaida, bandant ištrinti.']);
			}
		}
		return App::abort(404);
	}
}