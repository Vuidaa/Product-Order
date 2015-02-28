@extends('layout.main')

@section('content')
	<div class='col-md-12'>
        <h1 class='main-heading'> Prekė</h1>

        <div class="thumbnail">
            {{HTML::image("img/products/$product->photo" ,null)}}
            <div class="caption">
                <h4 class="pull-right">{{$product->price_eu .','.$product->getCents() }} €</h4>
                <h4><a href="#">{{$product->title}}</a></h4>
                <p> {{$product->description}}</p>
            </div>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <a href='{{URL::route('order.create.get',['id'=>$product->id])}}' class='btn btn-default add-product'> Pirkti </a>
            </div>
        </div>
        
    </div>
@stop