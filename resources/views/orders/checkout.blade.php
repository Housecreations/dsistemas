@extends('admin.templates.productos')


@section('title', 'Checkout')


@section('content')

<div class="col-md-10 items card">

<h4>Checkout</h4><span>Verifique bien los datos, una vez cargados no podrá modificarlos</span>



<hr>

{{--@if($order->edited == 'no')--}}

<div class="row">
<div class="col-md-6">

    

{!! Form::open(['url' => ['payments/pay'], 'method' => 'PUT']) !!}

<h5 class="text-center">Información de envío</h5>

<div class="form-group">
    
   {!! Form::label('shipment_agency', 'Agencia de envío') !!}
   <select class="form-control" required="required" id="shipment_agency" name="shipment_agency"><option selected="selected" value="">Seleccione una agencia</option>
  
      
   
@foreach($shipments as $shipment)
                <option value="{{$shipment->name}}">{{$shipment->name}}</option> 
               
              @endforeach
              
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
@if($active->active == 'no')
<h3 class="text-center bottom-space-md">Lo sentimos, los pagos están desactivados</h3>
@else
<div class="form-group">
    
    {!! Form::submit('Pagar', ['class' => 'cart-button'])!!}
    
</div>
@endif
<a href="{{ url('/carrito')}}" class="button">Atrás</a>


{!! Form::close() !!}
</div>
{{--@else

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
        <a href="{{ url('/carrito')}}" class="link-button">Atrás</a>
    </div>
</div>

@endif--}}

@endsection