@extends('admin.templates.principal')


@section('title', 'Agregar tag')


@section('content')
<div class="container-fluid">    
<div class="col-md-4"></div>
<div class="col-md-4 users">

 <a href="{{ route('admin.tags.index')}}" class="button">Atrás</a>
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