@extends('admin.templates.principal')


@section('title', 'Agregar cuenta bancaria')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.config.index')}}" class="button button-sm">Atrás</a>
    <hr>

{!! Form::open(['route' => 'admin.payments_accounts.store', 'method' => 'POST']) !!}
<div class="form-group">
{!! Form::label('bank_name', 'Nombre del banco') !!}
{!! Form::text('bank_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del banco']) !!}
</div>
<div class="form-group">
{!! Form::label('bank_account_number', 'Número de cuenta') !!}
{!! Form::number('bank_account_number', null, ['class' => 'form-control', 'required', 'placeholder' => 'Número de cuenta']) !!}
</div>
<div class="form-group">
{!! Form::label('bank_account_type', 'Tipo de cuenta') !!}
{!! Form::text('bank_account_type', null, ['class' => 'form-control', 'required', 'placeholder' => 'Tipo de cuenta']) !!}
</div>
<div class="form-group">
{!! Form::label('owner_name', 'Nombre del titular') !!}
{!! Form::text('owner_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del titular']) !!}
</div>
<div class="form-group">
{!! Form::label('owner_id', 'Cédula o RIF del titular') !!}
{!! Form::text('owner_id', null, ['class' => 'form-control', 'required', 'placeholder' => 'Cédula o RIF']) !!}
</div>
<div class="form-group">
{!! Form::label('owner_email', 'Correo electrónico asociado') !!}
{!! Form::email('owner_email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Correo electrónico']) !!}
</div>



<div class="form-group text-center">
    
    {!! Form::submit('Agregar', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection