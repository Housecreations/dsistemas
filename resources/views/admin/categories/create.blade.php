@extends('admin.templates.principal')


@section('title', 'Agregar área')


@section('content')
 <div class="container-fluid users">    
<div class="col-md-4"></div>
<div class="col-md-4">
{!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST']) !!}

    <div class="form-group">
        
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del área', 'required']) !!}
        
    </div>
    
   <!-- <div class="form-group">
    {!! Form::label('gender', 'Género') !!}
    {!! Form::select('gender', ['male' => 'Masculino', 'female' => 'Femenino'], null, ['class'=> 'form-control', 'placeholder' => 'Seleccione un género', 'required'] ) !!}
    
</div>-->

    <div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}
</div>
        </div>
@endsection

