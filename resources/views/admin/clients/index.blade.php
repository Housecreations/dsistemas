@extends('admin.templates.principal')


@section('title', 'Lista de clientes')


@section('content')

 <div class="">
   <div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">

<div class="col-md-12  col-sm-12  col-xs-12 ">
   <a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
    <a href="{{ route('admin.clients.create') }}" class='button button-md'>Nuevo Cliente</a>
     <hr>



<!-- Buscador de clientes -->

{!! Form::open(['route' => 'admin.clients.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="input-group">
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar cliente...', 'aria-describedby' => 'searchClients']) !!}

   
    <span class="input-group-addon" id="searchCategories"><span class="glyphicon glyphicon-search"  aria-hidden="true"></span></span>
    </div>
{!! Form::close() !!}
<!-- Fin buscador de clientes -->


<hr>

<div class="col-md-12">
      @foreach($clients as $client)
      
      <div class="col-md-4 col-sm-6 col-xs-12 admin-item-content">
          
          <h3>{{$client->name}}</h3>
          
           <div class="actions-content">
                <a href="{{ route('admin.clients.edit', $client->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.clients.destroy', $client->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a>
                </div>
          
          
          <img src="/images/clients/{{$client->logo_url}}" alt="">
          
           
          
          
      </div>
      
    @endforeach
</div>

<!--<table class='table table-hover'>
    
    <thead>
        <th>Id</th>
        <th>Nombre</th>
       
        <th>Acción</th>
    </thead>
    <tbody>
       @foreach($clients as $client)
           <tr>
               <td>{{$client->id}}</td>
               <td>{{$client->name}}</td>
               
           
           
               <td>
                <a href="{{ route('admin.clients.edit', $client->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.clients.destroy', $client->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a></td>
           </tr>
       @endforeach 
    </tbody>
    
</table> -->
<div class="text-center">
  {!! $clients->render() !!} 
</div>

     </div>
</div>
     </div>
@endsection