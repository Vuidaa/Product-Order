@extends('layout.main')

@section('content')
	<h1 class='main-heading'> Redaguoti prekę </h1>
	<div class='row'>
		<div class='col-md-4 col-md-offset-4'>
			 {{Form::model($product, ['route'=>['product.edit.post', $product->id],'method'=>'POST','role'=>'form','files'=>'true'])}}
				<div class='form-group'>
					{{Form::label('title','Prekės pavadinimas:')}}
					{{Form::text('title',Input::old('title'),['class'=>'form-control'])}}
					@if($errors->has('title'))
						<div class='alert alert-danger'>{{$errors->first('title')}} </div>
					@endif
				</div>

				<div class='form-group'>
					{{Form::label('','Prekės kaina:')}}</br>
					<small>Būtina nurodyti kainos eurus ir centus atskirai</small><br>
					{{Form::label('price_eu','Eurai')}}
					{{Form::text('price_eu',$product->price,['class'=>'form-control'])}}

					@if($errors->has('price_eu'))
						<div class='alert alert-danger'>{{$errors->first('price_eu')}} </div>
					@endif

					{{Form::label('price_ct','Centai')}}
					{{Form::text('price_ct',Input::old('price_ct'),['class'=>'form-control'])}}

					@if($errors->has('price_ct'))
						<div class='alert alert-danger'>{{$errors->first('price_ct')}} </div>
					@endif
				</div>
				
				<div class='form-group'>
					{{Form::label('description','Prekės aprašymas')}}
					{{Form::textarea('description',Input::old('description'),['class'=>'form-control'])}}

					@if($errors->has('description'))
						<div class='alert alert-danger'>{{$errors->first('description')}} </div>
					@endif
				</div>
				<div class='form-group'>
					{{Form::label('photo','Prekės nuotrauka')}}
						{{HTML::image("img/products/$product->sku/$product->photo" ,null, array('class'=>'img-responsive'))}}
					{{Form::file('photo')}}

					@if($errors->has('photo'))
						<div class='alert alert-danger'>{{$errors->first('photo')}} </div>
					@endif
				</div>
				<div class='form-group'>
					{{Form::submit('Atnaujinti',['class'=>'btn btn-default'])}}
				</div>
			{{Form::close()}}
		</div>
	</div>
@stop