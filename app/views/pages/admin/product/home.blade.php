@extends('layout.main')

@section('content')

	<h1 class='main-heading'> Prekės </h1>

	@if(Session::has('global'))
		<div class="{{Session::get('global.class')}}"> {{Session::get('global.message')}} </div>
	@endif

	@if(count($products))
		<table class='table table-striped main-table'>
			<thead>
				<th>Nuotrauka</th><th>Unikalus numeris</th> <th>Pavadinimas</th> <th>Kaina</th> 
				<th>Aprašymas</th><th>Sukurta</th><th>Atnaujinta</th><th>Keisti</th><th>Ištrinti</th>
			</thead>
				<tbody>
					@foreach($products as $product)
						<td>
	{{HTML::image("img/products/$product->sku/$product->photo" ,$product->title, array('width'=>'120px','class'=>'img-thumbnail'))}}
						</td>
						<td class='vert-align'>{{$product->sku}}</td>
						<td class='vert-align'>{{str_limit($product->title, $limit = 15, $end = '...')}}</td>
						<td class='vert-align'>
							{{$product->price_eu .','.$product->getCents().' €'}}
						</td>
						<td class='vert-align'>{{str_limit($product->description, $limit = 10, $end = '...')}}</td>
						<td class='vert-align'>{{$product->created_at}}</td>
						<td class='vert-align'>
							@if($product->created_at == $product->updated_at)
							<strong> Atnaujinimų nėra </strong>
							@else
							{{$product->updated_at}}
							@endif
						</td>
						<td class='vert-align'><a class='btn btn-success'href="{{URL::route('product.edit.get',['id'=>$product->id])}}">Redaguoti prekę</a></td>
						<td class='vert-align'>
						{{Form::open(['route'=>['product.destroy.post', $product->id], 'method'=>'POST','role'=>'form'])}}
							{{Form::submit('Ištrinti prekę',['class'=>'btn btn-danger'])}}
						{{Form::close()}}
						</td>
						</tr>
					@endforeach
				</tbody>
		</table>
		<?php echo $products->links(); ?>
	@else
		<h4> Šiuo metu prekių nėra, norėdami pridėti prekę spauskite čia <a href="{{URL::route('product.create.get')}}">Pridėti naują prekę</a></h4>
	@endif
@stop