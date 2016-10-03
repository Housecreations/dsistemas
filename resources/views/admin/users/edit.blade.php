@extends('admin.templates.principal')


@section('title', 'Editar usuario ' .$user->name )


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.users.index')}}" class="button button-sm">Atrás</a>
    <hr>

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
    
    {!! Form::submit('Editar', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}

    </div>
</div>
@endsection