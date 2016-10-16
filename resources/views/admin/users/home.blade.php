@extends('admin.templates.productos')

@section('title', 'Panel de ' . Auth::user()->name) 


@section('content') 
  
  

   <div class="items col-md-10 col-sm-10 col-xs-10 card">
   
    <div class="col-md-12 col-sm-12 col-xs-12 user-nav">
   <div class="col-md-6 col-sm-6 col-xs-6">
   <h3>Mis compras</h3>
   </div>
   
    <div class="col-md-6 col-sm-6 col-xs-6">
    <a href="{{route('member.password.edit')}}" class="button button-lg float-right">Cambiar contraseña</a>
   </div>
   </div>
   
   
   @if(count($Orders) == 0)
   <hr>
   <h5 class="text-center">No ha realizado compras</h5>
    </div>
   
   @else
   
   @foreach($Orders as $order)
   <hr>
   <div class="row">
     <div class="col-md-6">
       <h5 class="order-status {{$order->status}}">Estado: {{$order->status}}</h5>
       </div>
      <div class="col-md-6 text-right">
       <h5>Compra #{{$order->payment_id}}</h5><h5> Fecha: {{$order->created_at->format('d/m/Y')}}</h5>
       </div>
   
       <div class="col-md-6">
       <table class='table'>
           <thead>
        <th>Artículo</th>
        <th>Precio</th>
        
    </thead>
      <tbody>
         @foreach($order->orderDetails as $orderDetail)
          <tr>
              <td>{{$orderDetail->name}}</td>
              <td>{{$orderDetail->price}} {{$currency}}</td>
          </tr>
        @endforeach
          <tr>
                <td>Total</td>
                <td>{{$order->total}} {{$currency}}</td>
            </tr>
      </tbody>
       </table>
       </div>
       <div class="col-md-6">
           <h5 class="text-center">Información de envío</h5>
           <h5>Agencia de envío: {{$order->shipment_agency}}</h5>
           <h5>Identificador de agencia: {{$order->shipment_agency_id}}</h5>
           <h5>Número de guía: {{$order->guide_number}}</h5>
           @if($order->status == "Enviado")
           <h5>Fecha de envío: {{$order->updated_at->format('d/m/Y')}}</h5>
           @endif
           <hr>
           <h5 class="text-center">Información del receptor</h5>
           <h5>Nombres: {{$order->recipient_name}}</h5>
           <h5>C.I:{{$order->recipient_id}}</h5>
           <h5>Correo Electrónico: {{$order->recipient_email}}</h5>
       </div>
       
   </div>
   
  @endforeach
   @endif
   
</div>
   
@endsection