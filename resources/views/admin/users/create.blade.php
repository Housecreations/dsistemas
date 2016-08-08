@extends('admin.templates.principal')


@section('title', 'Crear usuario')


@section('content')

 <div class="container-fluid users">    
<div class="col-md-4"></div>
<div class="col-md-4">

{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

<div class="form-group">
    
   {!! Form::label('name', 'Nombre') !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre y apellido', 'required']) !!}
    
</div>

<div class="form-group">
    
   {!! Form::label('email', 'Correo electrónico') !!}
   {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Sucorreo@dominio.com', 'required']) !!}
    
</div>

<div class="form-group">
    
   {!! Form::label('password', 'Contraseña') !!}
   {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '**********', 'required']) !!}
    
</div>

<!--<div class="form-group">
    {!! Form::label('type', 'Tipo') !!}
    {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class'=> 'form-control', 'placeholder' => 'Seleccione un tipo de usuario', 'required'] ) !!}
    
</div>
-->
<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}
     </div>
     </div>
@endsection