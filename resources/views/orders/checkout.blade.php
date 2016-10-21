@extends('admin.templates.productos')


@section('title', 'Checkout')


@section('content')

<div class="col-md-10 items card">

<h4>Checkout</h4><span>Verifique bien los datos, una vez cargados no podrá modificarlos</span>
<h4>¡IMPORTANTE!</h4><span>Una vez realizado el pago en la plataforma MercadoPago, haga clic en 'continuar' para ser redireccionado de vuelta a la aplicación</span>



<hr>

{{--@if($order->edited == 'no')--}}

<div class="row">
<div class="col-md-6">

    

{!! Form::open(['url' => ['payments/pay'], 'method' => 'POST', 'id' => 'payments_form']) !!}

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

<div class="form-group">
    
   {!! Form::label('payment_type', 'Método de pago') !!}
 <select class="form-control" required="required" id="payment_type" name="payment_type"><option selected="selected" value="">Seleccione un tipo de pago</option>
  
      <option value="TDC">Tarjeta de crédito</option> 
   
@foreach($payments_accounts as $payments_account)
                <option value="{{$payments_account->id}}">{{$payments_account->bank_name}}</option> 
               
              @endforeach
              
           </select>
    
</div>


<img class='payment-logo' src="/images/mercadopago.png" alt="">
<img class='payment-logo' src="/images/visa-master-logo.png" alt="">

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


@endsection