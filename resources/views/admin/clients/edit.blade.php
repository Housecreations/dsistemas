@extends('admin.templates.principal')


@section('title', 'Editar cliente ' .$client->name )


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-12 card">

<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
    
    <a href="{{ route('admin.clients.index')}}" class="button button-sm">Atrás</a>
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
    
   <div class="col-md-12">
       
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