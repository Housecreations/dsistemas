@extends('admin.templates.principal')


@section('title', 'Editar usuario ' .$user->name )


@section('content')
<div class="container-fluid">    
<div class="col-md-4"></div>
<div class="users col-md-4">
{!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}

<div class="form-group">
    
   {!! Form::label('name', 'Nombre') !!}
   {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre y apellido', 'required']) !!}
    
</div>

<div class="form-group">
    
   {!! Form::label('email', 'Correo electrónico') !!}
   {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Sucorreo@dominio.com', 'required']) !!}
    
</div>



<div class="form-group">
    {!! Form::label('type', 'Tipo') !!}
    {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], $user->type, ['class'=> 'form-control'] ) !!}
    
</div>

<div class="form-group">
    
    {!! Form::submit('Editar', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}

    </div>
</div>
@endsection