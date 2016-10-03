@extends('admin.templates.principal')

@section('title', 'Panel administracion') 


@section('content') 

<div class='admin-index'>
 @include('admin.templates.partials.adminnav')


<div class="col-md-2 col-xs-2"></div>
<div class="col-md-8 col-xs-8">
    
   

    
    <div class="admin-slider">
       
        <div class="row">
        <h4 class="text-center">Ventas</h4>
           <hr>
         <div class="col-md-12 col-sm-12">
          
           
           <div class="col-md-6 sale-data">
               <span>{{$totalMonth}} Bs</span>
               Ingresos del mes
           </div>
           <div class="col-md-6 sale-data">
               <span>{{$totalMonthCount}}</span>
               Cantidad de ventas
           </div>
           
           
           <div class="col-md-12 text-center">
           <hr>
           <a href="{{url('/admin/orders')}}"><h5>Órdenes del mes</h5> 
           
           @if($orderCount > 0)
            <span class="badge badge-color">{{$orderCount}}</span>
           @else
           <span class="badge">{{$orderCount}}</span>
           @endif
           
           </a>
           
            <a href="{{url('/admin/orders/all')}}"><h5>Ver todas las órdenes</h5> 
            
            @if($orderCountAll > 0)
            <span class="badge badge-color">{{$orderCountAll}}</span>
            @else
            <span class="badge">{{$orderCountAll}}</span>
            @endif
            </a>
           
           </div>
           
           </div>
         
       </div>
       
       <hr>
        <div class="row">
        <h4 class="text-center top-space">Slider</h4>
           <hr>
        <div class="templatemo-gallery-item collection col-md-12 front">
        <a href="{{ route('admin.front.edit')}}">
        @if($carousel)
        <img src="images/slider/{{$carousel->image_url}}" alt="">
        @else
        <img src="images/slider/" alt="">
        @endif
        <div class="templatemo-gallery-image-overlay"></div>
        
       
       </a> </div>
       </div>
       
       
        
        
    </div>
    
</div>
</div>

@endsection