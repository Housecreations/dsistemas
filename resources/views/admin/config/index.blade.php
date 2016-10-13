@extends('admin.templates.principal')

@section('title', 'Configuración') 


@section('content') 
  
  
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-2 col-sm-7 col-sm-offset-2 col-xs-10 col-xs-offset-1">


<div class="button-container">
<a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
  
 <a href="{{ route('admin.shipment.create')}}" class="button button-lg">Nueva empresa de envío</a>  
    
{!! Form::open(['route' => 'admin.config.status', 'method' => 'POST', 'id' => 'store-status-form']) !!}

<div class="form-group">
   
   
   @if($config->active == 'yes')
<button type="submit" class="button-on ">
Tienda activa
</button>
@else
<button type="submit" class="button-on button-off">
Tienda Inactiva
</button>
@endif
    
   
    
</div>

{!! Form::close() !!}
</div>
<hr>
  
  <table class="table table-hover">
      
      <thead>
          <tr>
              <th>Nombre empresa envíos</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tbody>
         @foreach($shipments as $shipment)
          <tr>
              <td>{{$shipment->name}}</td>
              <td><a href="{{ route('admin.shipment.edit', $shipment->id)}}" title="Editar" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.shipment.destroy', $shipment->id) }}" title="Eliminar" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a></td>
          </tr>
          @endforeach
      </tbody>
      
  </table>
    </div>
</div>
  
   
   
@endsection