@extends('layout.main')

@section('content')
	<div class='col-md-12'>
        <h1 class='main-heading'>Prekė</h1>
        <div class="thumbnail">
            {{HTML::image("img/products/$product->photo" ,$product->title)}}
            <div class="caption">
                <h4 class="pull-right">{{$product->price_eu .','.$product->getCents() }} €</h4>
                <h4><a href="#">{{$product->title}}</a></h4>
                <p> {{$product->description}}</p>
            </div>
        </div>
    </div>
@stop