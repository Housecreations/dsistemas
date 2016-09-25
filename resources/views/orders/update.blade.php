@extends('admin.templates.productos')


@section('title', 'Actualizar orden')


@section('content')

<div class="col-md-10 items">

<h4>Actualizar orden</h4><span>Verifique bien los datos, una vez cargados no podrá modificarlos</span>



<hr>

@if($order->edited == 'no')

<div class="row">
<div class="col-md-6">

    

{!! Form::open(['route' => ['orders.update', $order->customid], 'method' => 'PUT']) !!}

<h5 class="text-center">Información de envío</h5>

<div class="form-group">
    
   {!! Form::label('shipment_agency', 'Agencia de envío') !!}
   <select class="form-control" required="required" id="shipment_agency" name="shipment_agency"><option selected="selected" value="">Seleccione una agencia</option>
  
      
   
                <option value="MRW">MRW</option> 
                <option value="Zoom">Zoom</option>   
              
           </select>
    
</div>

<div class="form-group">
    
   {!! Form::label('shipment_agency_id', 'Identificador de la agencia') !!}
   {!! Form::text('shipment_agency_id', '', ['class' => 'form-control', 'placeholder' => 'Zoom: Zoom Libertador | Mrw: 1600000', 'required']) !!}
    
</div>


</div>

<div class="col-md-6">
   
   <h5 class="text-center">Información del receptor</h5>
    
    <div class="form-group">
    
   {!! Form::label('recipient_name', 'Nombres') !!}
   {!! Form::text('recipient_name', '', ['class' => 'form-control', 'placeholder' => 'Nombre y apellido', 'required']) !!}
    
</div>
 <div class="form-group">
    
   {!! Form::label('recipient_id', 'Cédula de identidad') !!}
   {!! Form::number('recipient_id', '', ['class' => 'form-control', 'placeholder' => '1234567', 'required']) !!}
    
</div>


<div class="form-group">
    
   {!! Form::label('recipient_email', 'Correo electrónico') !!}
   {!! Form::email('recipient_email', '', ['class' => 'form-control', 'placeholder' => 'Sucorreo@dominio.com', 'required']) !!}
    
</div>


</div>
    
    
</div>
<hr>
<div class="form-group">
    
    {!! Form::submit('Actualizar', ['class' => 'cart-button'])!!}
    
</div>
<a href="{{ url('/home')}}" class="button">Atrás</a>


{!! Form::close() !!}
</div>
@else

<div class="row">
    
    <div class="col-md-6">
            <h5 class="text-center">Información de envío</h5>
            
            <h5>Agencia de envío: {{$order->shipment_agency}}</h5>
            <h5>Identificador de agencia: {{$order->shipment_agency_id}}</h5>
            <h5>Número de guía: {{$order->guide_number}}</h5>
    </div>
    <div class="col-md-6">
        <h5 class="text-center">Información del receptor</h5>
         <h5>Nombres: {{$order->recipient_name}}</h5>
           <h5>C.I:{{$order->recipient_id}}</h5>
           <h5>Correo Electrónico: {{$order->recipient_email}}</h5>
        
    </div>
    
    <div class="col-md-12">
       <hr>
        <a href="{{ url('/home')}}" class="link-button">Atrás</a>
    </div>
</div>

@endif

@endsection