@extends('admin.templates.principal')


@section('title', 'Editar cliente ' .$client->name )


@section('content')
<div class="container-fluid">    
<div class="col-md-4"></div>
<div class="col-md-4 users">
    
    <a href="{{ route('admin.clients.index')}}" class="button">Atrás</a>
    <hr>
    
{!! Form::open(['route' => ['admin.clients.update', $client->id], 'method' => 'PUT', 'files' => true]) !!}

<div class="form-group">
    
   {!! Form::label('name', 'Nombre cliente') !!}
   {!! Form::text('name', $client->name, ['class' => 'form-control', 'placeholder' => 'Nombre del cliente', 'required']) !!}
    
</div>
    
    
    <div class="form-group">
    
   {!! Form::label('message', 'Mensaje') !!}
   {!! Form::textarea('message', $client->message, ['class' => 'form-control', 'placeholder' => 'Mensaje', 'required']) !!}
    
</div>  
    

<div class="form-group">
    
   <div class="col-md-8">
       
       <img src="/images/clients/{{$client->logo_url}}" alt="">
       
   </div>
    
</div>  

<div class="form-group">
    {!! Form::label('image', 'Logo del cliente') !!}
    {!! Form::file('image') !!}
    
</div>



<div class="form-group">
    
    {!! Form::submit('Editar', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}

    </div>
</div>
@endsection