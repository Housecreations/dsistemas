@extends('admin.templates.principal')


@section('title', 'Agregar empresa envíos')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.config.index')}}" class="button button-sm">Atrás</a>
    <hr>

{!! Form::open(['route' => 'admin.shipment.store', 'method' => 'POST']) !!}
<div class="form-group">
{!! Form::label('name', 'Nombre de la empresa de envíos') !!}
{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la empresa de envíos']) !!}
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection