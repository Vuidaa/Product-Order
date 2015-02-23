<?php

class OrderController extends BaseController
{

	protected $order;

	public function __construct(Order $order)
	{
		$this->order = $order;
	}

	//User side pages

	/*==========================Get create new order page for user==========================*/
	public function getCreate($id)
	{
		$product = Product::findorFail($id);

		return View::make('pages/new-order')->with('product',$product);
	}


	/*==========================Create new order for user==========================*/
	public function postCreate($id)
	{
		if($this->order->validate(Input::all()))
		{
			if($this->order->createOrder(Input::all(), $id))
			{
				return Redirect::route('home.index.get')->with('global',['class'=>'alert alert-success','message'=>'Užsakymas pateiktas, su jumis bus susisiekta.']);
			}
			else
			{
				return Redirect::route('home.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Užsakymas nepavyko, bandyti vėliau.']);
			}
		}
		else
		{
			return Redirect::route('order.create.get',['id'=>$id])->withErrors($this->order->errors)->withInput();
		}
	}




	//Admin side pages

	/*==========================Get all orders for admin==========================*/
	public function getIndex($rule = 'DESC')
	{
		$rules = array('DESC'=>'DESC','ASC'=>'ASC');

		if(!in_array($rule, $rules))
		{
			$rule = 'DESC';
		}

		return View::make('pages.admin.order.home')->with(array(
			'orders'=>$this->order->orderBy('created_at', $rule)->paginate(10),
			'status'=>Status::lists('status','id')));
	}


	/*==========================Change order`s status==========================*/
	public function postChangeStatus($id)
	{
		if(Status::where('id', '=', Input::get('status'))->count() > 0)
		{
		 	$order = $this->order->where('id','=',$id)->first();

		 	if($order)
		 	{
		 		$order->status_id = Input::get('status');

			 	$order->save();

			 	return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-success','message'=>'Statusas pakeistas.']);
		 	}

		 	return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Užsakymas nerastas.']);
		}

		return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Klaida keičiant statusą.']);
	}


	/*==========================Change order`s uniq number==========================*/
	public function postChangeNumber($id)
	{
		$order = $this->order->where('id','=',$id)->first();

	 	if($order)
	 	{
	 		if(Input::get('uniq_number') === '')
	 		{
	 			return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Numeris negali būti tusčias.']);
	 		}

	 		if($this->order->where('uniq_number','=',Input::get('uniq_number'))->first())
	 		{
	 			return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Skelbimas su tokiu numeriu jau egzistuoja.']);
	 		}
	 		$order->uniq_number = Input::get('uniq_number');

		 	$order->save();

		 	return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-success','message'=>'Unikalus numeris pakeistas.']);
	 	}

	 	return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-danger','message'=>'Klaida keičiant unikalų numerį.']);
	}

	/*==========================Delete order for admin==========================*/
	public function postDestroy($id)
	{
		$order = $this->order->find($id);

		if($order->count())
		{
			$address = Address::where('order_id','=',$order->id)->delete();

			$order->delete();

			return Redirect::route('order.index.get')->with('global',['class'=>'alert alert-success','message'=>'Užsakymas ištrintas.']);
		}
		return App::abort(404);
	}
}