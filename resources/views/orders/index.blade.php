@extends('admin.templates.principal')


@section('title', 'Órdenes del mes')


@section('content')

<div class="col-md-1"></div>
<div class="col-md-10 users">
   
    <div class="row">
       
        <div class="col-md-12 card">
           <div class="row">
           <div class="col-md-12">
        <a href="{{url('/admin')}}">Atrás</a>
   </div></div>
            <h4>Órdenes del mes</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID venta</td>
                        <td>Comprador</td>
                        <td>Receptor</td>
                        <td>Agencia Envío</td>
                        <td>Identificador agencia</td>
                        <td>Número de guía</td>
                        <td>Status</td>
                        <td>Fecha de venta</td>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->payment_id}}</td>
                        <td>{{$order->shoppingCart->user->email}}</td>
                        <td>{{$order->recipient_email}}</td>
                        <td>{{$order->shipment_agency}}</td>
                        <td>{{$order->shipment_agency_id}}</td>
                        <td>
                            <a href="#" data-type='text' 
                                        data-pk='{{$order->id}}' 
                                        data-url="{{url('/admin/orders/'.$order->id)}}"
                                        data-title='Número de guía'
                                        data-value="{{$order->guide_number}}"
                                        class="set-guide-number"
                                        data-name="guide_number"></a>
                        </td>
                        <td><a href="#" data-type='select' 
                                        data-pk='{{$order->id}}' 
                                        data-url="{{url('/admin/orders/'.$order->id)}}"
                                        data-title='Status'
                                        data-value="{{$order->status}}"
                                        class="select-status"
                                        data-name="status"></a>
                        </td>
                        <td>{{$order->created_at}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

</div>
@endsection