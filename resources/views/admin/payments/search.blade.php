@extends('admin.templates.principal')

@section('title', 'Buscar pago') 


@section('content') 
  
  
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<div class="col-md-12"><h4 class="text-center">Buscar pago no notificado</h4></div>

<a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
    <hr>
    
    

{!! Form::open(['route' => 'admin.payments.search', 'method' => 'POST']) !!}

<div class="form-group">
{!! Form::label('payment_id', 'Número de pago') !!}
{!! Form::number('payment_id', null, ['class' => 'form-control', 'required']) !!}

</div>

<div class="form-group text-center">
    
    {!! Form::submit('Buscar pago', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
  
   
   
@endsection