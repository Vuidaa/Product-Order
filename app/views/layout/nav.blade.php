<ul class="nav nav-tabs">

  <li role="presentation" ><a href='{{URL::route('home.index.get')}}'> Parduotuvė </a></li>

  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Užsakymai <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
      <li><a href='{{URL::route('order.index.get')}}'>Peržiūrėti visus</a></li>
    </ul>
  </li>

  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Prekės <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
      <li><a href='{{URL::route('product.index.get')}}'>Peržiūrėti visus</a></li>
      <li><a href='{{URL::route('product.create.get')}}'>Pridėti naują</a></li>
    </ul>
  </li>
  
</ul>

