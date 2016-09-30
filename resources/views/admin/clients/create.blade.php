@extends('admin.templates.principal')


@section('title', 'Agregar cliente')


@section('content')
<div class="container-fluid">    
<div class="col-md-4"></div>
<div class="col-md-4 users">

 <a href="{{ route('admin.clients.index')}}" class="button">Atrás</a>
    <hr>
    

{!! Form::open(['route' => 'admin.clients.store', 'method' => 'POST', 'files' => true]) !!}
<div class="form-group">
{!! Form::label('name', 'Nombre cliente') !!}
{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del cliente']) !!}
</div>

<div class="form-group">
{!! Form::label('message', 'Mensaje') !!}
{!! Form::textarea('message', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Mensaje']) !!}
</div>


<div class="form-group">
    {!! Form::label('image', 'Logo del cliente') !!}
    {!! Form::file('image') !!}
    
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection