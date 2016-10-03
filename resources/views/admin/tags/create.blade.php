@extends('admin.templates.principal')


@section('title', 'Agregar tag')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-12 card">    

<div class="col-md-6 col-md-offset-3">

 <a href="{{ route('admin.tags.index')}}" class="button button-sm">Atrás</a>
    <hr>
    

{!! Form::open(['route' => 'admin.tags.store', 'method' => 'POST']) !!}
<div class="form-group">

{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del tag']) !!}
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Registrar tag', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection