@extends('admin.templates.productos')

@section('title', 'Panel de ' . Auth::user()->name) 


@section('content') 
  
  

   <div class="items col-md-10">
   
   <h4>Mis compras</h4>
   
   
   @if(count($Orders) == 0)
   <hr>
   <h5 class="text-center">No ha realizado compras</h5>
    </div>
   
   @else
   
   @foreach($Orders as $order)
   <hr>
   <div class="row">
     <div class="col-md-6">
       <h5>Estado: {{$order->status}}</h5>
       </div>
      <div class="col-md-6 text-right">
       <h5>Compra #{{$order->payment_id}}</h5>
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
              <td>{{$orderDetail->price}}</td>
          </tr>
        @endforeach
          <tr>
                <td>Total</td>
                <td>{{$order->total}}</td>
            </tr>
      </tbody>
       </table>
       </div>
       <div class="col-md-6">
           <h5 class="text-center">Información de envío</h5>
           <h5>Agencia de envío: {{$order->shipment_agency}}</h5>
           <h5>Identificador de agencia: {{$order->shipment_agency_id}}</h5>
           <h5>Número de guía: {{$order->guide_number}}</h5>
           <h5 class="text-center">Información del receptor</h5>
           <h5>Nombres: {{$order->recipient_name}}</h5>
           <h5>C.I:{{$order->recipient_id}}</h5>
           <h5>Correo Electrónico: {{$order->recipient_email}}</h5>
       </div>
       <div class="col-md-12">
         
          @if($order->edited == 'no')
           <hr>
           <a href="{{url('/orders/'.$order->customid)}}" class="button">Actualizar información</a>
          
           @endif
       </div>
   </div>
   
  @endforeach
   @endif
   
</div>
   
@endsection