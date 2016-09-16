@extends('admin.templates.productos')

@section('title', 'Panel de ' . Auth::user()->name) 


@section('content') 
  
  

   <div class="items col-md-10">
   
   <h4>Mis compras</h4>
   <p class="text-center">No ha realizado ninguna compra</p>
   
</div>
   
@endsection