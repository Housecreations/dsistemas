@extends('admin.templates.principal')


@section('title', 'Editar cuenta bancaria')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.config.index')}}" class="button button-sm">Atrás</a>
    <hr>

{!! Form::open(['route' => ['admin.payments_accounts.update', $payments_account->id], 'method' => 'PUT']) !!}
<div class="form-group">
{!! Form::label('bank_name', 'Nombre del banco') !!}
{!! Form::text('bank_name', $payments_account->bank_name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del banco']) !!}
</div>
<div class="form-group">
{!! Form::label('bank_account_number', 'Número de cuenta') !!}
{!! Form::number('bank_account_number', $payments_account->bank_account_number, ['class' => 'form-control', 'required', 'placeholder' => 'Número de cuenta']) !!}
</div>
<div class="form-group">
{!! Form::label('bank_account_type', 'Tipo de cuenta') !!}
{!! Form::text('bank_account_type', $payments_account->bank_account_type, ['class' => 'form-control', 'required', 'placeholder' => 'Tipo de cuenta']) !!}
</div>
<div class="form-group">
{!! Form::label('owner_name', 'Nombre del titular') !!}
{!! Form::text('owner_name', $payments_account->owner_name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del titular']) !!}
</div>
<div class="form-group">
{!! Form::label('owner_id', 'Cédula o RIF del titular') !!}
{!! Form::text('owner_id', $payments_account->owner_id, ['class' => 'form-control', 'required', 'placeholder' => 'Cédula o RIF']) !!}
</div>
<div class="form-group">
{!! Form::label('owner_email', 'Correo electrónico asociado') !!}
{!! Form::email('owner_email', $payments_account->owner_email, ['class' => 'form-control', 'required', 'placeholder' => 'Correo electrónico']) !!}
</div>



<div class="form-group text-center">
    
    {!! Form::submit('Agregar', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection