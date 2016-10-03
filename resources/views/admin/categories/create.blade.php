@extends('admin.templates.principal')


@section('title', 'Agregar área')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">  

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.categories.index')}}" class="button button-sm">Atrás</a>
    <hr>

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

