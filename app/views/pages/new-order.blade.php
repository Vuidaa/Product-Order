@extends('layout.main')

@section('content')
	<div class='col-md-9 col-sm-9'>

		<h1 class='main-heading'>Apmokėjimas</h1>

		<div class='row'>
	    	<div class='col-md-8 col-sm-8'>
	    		{{Form::open(['route'=>['order.create.post',$product->id],'role'=>'form'])}}

					<div class='form-group row'>
						<div class='col-md-6'>
							{{Form::label('name','Vardas:')}}
							{{Form::text('name',Input::old('name'),['class'=>'form-control'])}}
							@if($errors->has('name'))
								<div class='alert alert-danger'>{{$errors->first('name')}} </div>
							@endif
						</div>
						<div class='col-md-6'>
							{{Form::label('surname','Pavardė:')}}
							{{Form::text('surname',Input::old('surname'),['class'=>'form-control'])}}
							@if($errors->has('surname'))
								<div class='alert alert-danger'>{{$errors->first('surname')}} </div>
							@endif
						</div>
					</div>


					<div class='form-group row'>
						<div class='col-md-6'>
							{{Form::label('email','El. paštas:')}}
							{{Form::email('email',Input::old('email'),['class'=>'form-control'])}}
							@if($errors->has('email'))
								<div class='alert alert-danger'>{{$errors->first('email')}} </div>
							@endif
						</div>
						<div class='col-md-6'>
							{{Form::label('phone','Telefono numeris:')}}
							{{Form::text('phone',Input::old('phone'),['class'=>'form-control'])}}
							@if($errors->has('phone'))
								<div class='alert alert-danger'>{{$errors->first('phone')}} </div>
							@endif
						</div>
					</div>


					<div class='form-group row'>
						<div class='col-md-6'>
							{{Form::label('personal_number','Asmens kodas:')}}
							{{Form::text('personal_number',Input::old('personal_number'),['class'=>'form-control'])}}
							@if($errors->has('personal_number'))
								<div class='alert alert-danger'>{{$errors->first('personal_number')}} </div>
							@endif
						</div>
					</div>


					<div class='form-group row'>
						<div class='col-md-12'>
							{{Form::label('street','Gatvė:')}}
							{{Form::text('street',Input::old('street'),['class'=>'form-control'])}}
							@if($errors->has('street'))
								<div class='alert alert-danger'>{{$errors->first('street')}} </div>
							@endif
						</div>
					</div>


					<div class='form-group row'>
						<div class='col-md-4'>
							{{Form::label('post_code','Pašto kodas:')}}
							{{Form::text('post_code',Input::old('post_code'),['class'=>'form-control'])}}
							@if($errors->has('post_code'))
								<div class='alert alert-danger'>{{$errors->first('post_code')}} </div>
							@endif
						</div>
						<div class='col-md-4'>
							{{Form::label('city','Miestas:')}}
							{{Form::text('city',Input::old('city'),['class'=>'form-control'])}}
							@if($errors->has('city'))
								<div class='alert alert-danger'>{{$errors->first('city')}} </div>
							@endif
						</div>
						<div class='col-md-4'>
							{{Form::label('country','Šalis:')}}
							{{Form::text('country',Input::old('country'),['class'=>'form-control'])}}
							@if($errors->has('country'))
								<div class='alert alert-danger'>{{$errors->first('country')}} </div>
							@endif
						</div>
					</div>

					<div class='form-group'>
						{{Form::submit('Pateikti užsakymą',['class'=>'btn btn-default'])}}
					</div>
				{{Form::close()}}
	    	</div>
		</div>
	</div>

	<div class='col-md-3 col-sm-3'>
		<h1>Prekė</h1>
		<div class='row'>
			<div class='col-md-12'>
				<h4>{{$product->title}} - <b> {{$product->price_eu.','.$product->getCents().' €'}} </b></h4>
				{{HTML::image("img/products/$product->sku/$product->photo" ,$product->title, array('class'=>'img-responsive'))}}
			</div>
		</div>
	</div>
@stop