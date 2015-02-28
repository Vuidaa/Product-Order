@extends('layout.main')

@section('content')
	<div class='col-md-12'>
        
    	<h1 class='main-heading'>Prekės</h1>

        @if(Session::has('global'))
            <div class='{{Session::get('global.class')}}'>{{Session::get('global.message')}}</div>
        @endif
        
       @foreach(array_chunk($products->getCollection()->all(), 3) as $chunk)
           <div class='row'>

                @foreach ($chunk as $product)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            {{HTML::image("img/products/$product->photo" ,$product->title)}}
                            <div class="caption">
                                <h4 class="pull-right">{{$product->price_eu .','.$product->getCents() }} €</h4>
                                <h4><a href="#">{{str_limit($product->title, $limit = 40, $end = '...')}}</a></h4>
                                <p>{{str_limit($product->description, $limit = 35, $end = '...')}}</p>
                            </div>
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
<a href='{{URL::route('product.single.get',['id'=>$product->id])}}' class='btn btn-default'> Peržiūrėti </a>
<a href='{{URL::route('order.create.get',['id'=>$product->id])}}' class='btn btn-default add-product'> Pirkti </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach
        <?php echo $products->links(); ?>
    </div>
@stop