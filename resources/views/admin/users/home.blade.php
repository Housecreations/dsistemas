@extends('admin.templates.productos')

@section('title', 'Panel de ' . Auth::user()->name) 


@section('content') 
  
  

   <div class="items col-md-10">
   
   <h4>Mis compras</h4>
   <hr>
   <div class="row">
     <div class="col-md-6">
       <h5>Estado: Por confirmar</h5>
       </div>
      <div class="col-md-6 text-right">
       <h5>Compra #12456421</h5>
       </div>
       
       <div class="col-md-6">
       <table class='table'>
           <thead>
        <th>Artículo</th>
        <th>Precio</th>
        
    </thead>
      <tbody>
          <tr>
              <td>Articulo 1</td>
              <td>100</td>
          </tr>
          <tr>
              <td>Articulo 2</td>
              <td>200</td>
          </tr>
          <tr>
                <td>Total</td>
                <td>300</td>
            </tr>
      </tbody>
       </table>
       </div>
       <div class="col-md-6">
           <h5 class="text-center">Información de envío</h5>
           <h5>Agencia de envío:</h5>
           <h5>Identificador de agencia:</h5>
           <h5>Número de guía:</h5>
           <h5 class="text-center">Información del receptor</h5>
           <h5>Nombres:</h5>
           <h5>C.I:</h5>
           <h5>Correo Electrónico:</h5>
       </div>
       <div class="col-md-12">
           <a href="" class="button">Actualizar información</a>
       </div>
   </div>
   
  
   
   
</div>
   
@endsection