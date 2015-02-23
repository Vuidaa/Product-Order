@extends('layout.main')

@section('content')

	<h1 class='main-heading'> Užsakymai </h1>

	@if(Session::has('global'))
		<div class="{{Session::get('global.class')}}"> {{Session::get('global.message')}} </div>
	@endif

	@if(count($orders))

		<div>
			<h4> Rūšiuoti pagal:
			 <a  class='btn btn-default' href='{{URL::route('order.index.get',['rule'=>'ASC'])}}'>Seniausi viršuje</a>
			 <a  class='btn btn-default' href='{{URL::route('order.index.get',['rule'=>'DESC'])}}'>Naujausi viršuje</a>
			</h4>
		</div>

		@foreach($orders as $order)
  		<div class='row'>

  			<div class='col-md-12 text-center'>

          <div class='thumbnail'>
            <h3 class="order-title {{$order->status->class}}"> Užsakymo numeris: {{$order->id}}</h3>
  	        <h4 class="{{$order->status->class}}"> Unikalus numeris: <i>{{$order->uniq_number}} </i> </h4>

          <div class='row'>

            <div class='col-md-2'>
              <h4> Prekė: </h4>
              <p><b>Pavadinimas:</b></p> 
                <p>{{str_limit($order->product->title, $limit = 15, $end = '...')}}</p>
              <p><b>Kaina:</b></p>
                <p>{{$order->product->price_eu .','.$order->product->getCents()}}€</p>
              <p><b>Aprašymas:</b></p>
                <p>{{str_limit($order->product->description, $limit = 10, $end = '...')}}</p>
              <p><b>Nuoroda į prekę:</b></p>
                <p><a class='btn btn-default' href='{{URL::route('product.single-admin.get',['id'=>$order->product->id])}}' >Nuoroda</a></p> 
            </div>

            <div class='col-md-3'>
              <h4>Užsakovo informacija:</h4>
              <p><b>Vardas ir pavardė</b></p> 
                <p>{{$order->name.' '. $order->surname}}</p>
              <p><b>El. paštas:</b></p> 
              	<p>{{$order->email}}</p>
              <p><b>Telefono numeris:</b></p> 
              	<p>{{$order->phone}}</p>
            </div>

            <div class='col-md-3'>
              <h4>Užsakovo adresas:</h4>
                  <p><b>Gatvė:</b></p> 
              	<p>{{$order->address->street}}</p>
              	<p><b>Miestas:</b></p> 
              	<p>{{$order->address->city}}</p>
              	    <p><b>Pašto kodas:</b></p> 
              	<p>{{$order->address->post_code}}</p>
              	    <p><b>Šalis:</b></p> 
              	<p>{{$order->address->country}}</p>
            </div>

            <div class='col-md-2'>
              <h4>Statusas:</h4>
              <p><b>Būsena:</b></p> 
                <p>{{$order->status->status}}</p>
              <p><b>Keisti būseną:</b></p> 
              <div> 
                {{Form::open(['route'=>['order.change-status.post',"$order->id"],'role'=>'form'])}}
                <div class='form-group'>
              {{Form::select('status',array('default' => 'Pasirinkite būseną') + $status,null,['class'=>'form-control'])}}
                </div>
                {{Form::submit('Keisti',['class'=>'btn btn-default'])}}
                {{Form::close()}}
              </div>
            </div>

            <div class='col-md-2'>
              <h4>Unikalus numeris:</h4>
              <p><b>Dabartinis numeris:</b></p> 
              @if($order->uniq_number == '')
                {{'Unikalaus numerio nėra'}}
              @endif
                <p>{{$order->uniq_number}}</p>
              <p><b>Keisti numerį:</b></p> 
        			{{Form::open(['route'=>['order.change-number.post',$order->id], 'role'=>'form'])}}
        				<div class='form-group'>
  		            	{{Form::text('uniq_number',null,['class'=>'form-control'])}}
  		            </div>
  		            {{Form::submit('Keisti',['class'=>'btn btn-default'])}}
        			{{Form::close()}}
              <br><p><b>Ištrinti skelbimą:</b></p> 
                {{Form::open(['route'=>['order.destroy.post', $order->id], 'method'=>'POST','role'=>'form'])}}
              {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {{Form::close()}}
            </div>


          </div>
        </div>
      </div>
    </div>
        <?php echo $orders->links(); ?>
		@endforeach

	@else
		<h4>Užsakymų nėra</h4>
	@endif

@stop